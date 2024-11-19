const defaultDataSet = {
    length: 5,
    Hw: 1.2, // wall height
    backslope: 3.2,
    toeslope: 4.0,
    e0: 0.14, // inactive zone
    d: 200, // diameter of timber pole
    D: 119.0, // diameter of concrete
    Z0: 2.5, // depth of rotation
    HTS: 0,
    LTS: 1.0,
    LS: 1.5,
}

function createLine(scene, options = {}) {
    const {
        name = "",
        isHorizontal = true,
        isLeft = true,
        firstPosition = { x: 0, y: 0, z: 0 },
        endPosition = { x: 1, y: 1, z: 0 },
        lineSlope = 1,
        color = new BABYLON.Color3(0, 0, 0),
        diameter = 0.1,
        tessellation = 8,
        label = "",
        labelOffset = 0.1,
        fontSize = 24
    } = options;

    let startPoint, endPoint;

    if (isHorizontal) {
        startPoint = new BABYLON.Vector3(
            firstPosition.x,
            firstPosition.y,
            firstPosition.z
        );

        endPoint = new BABYLON.Vector3(
            endPosition.x,
            firstPosition.y + (isLeft ? 1 : -1) * ((endPosition.x - firstPosition.x) * lineSlope),
            firstPosition.z
        );
    } else {
        startPoint = new BABYLON.Vector3(
            firstPosition.x,
            firstPosition.y,
            firstPosition.z
        );

        endPoint = new BABYLON.Vector3(
            firstPosition.x + (isLeft ? 1 : -1) * ((endPosition.y - firstPosition.y) * lineSlope),
            endPosition.y,
            firstPosition.z
        );
    }

    // Create path for the tube
    const path = [];
    const numPoints = 20;

    for (let i = 0; i <= numPoints; i++) {
        const t = i / numPoints;
        const x = startPoint.x + (endPoint.x - startPoint.x) * t;
        const y = startPoint.y + (endPoint.y - startPoint.y) * t;
        const z = startPoint.z + (endPoint.z - startPoint.z) * t;
        path.push(new BABYLON.Vector3(x, y, z));
    }

    // Create the tube
    const tube = BABYLON.MeshBuilder.CreateTube(name, {
        path: path,
        radius: diameter / 2,
        tessellation: tessellation,
        updatable: true
    }, scene);

    // Create and apply material
    const material = new BABYLON.StandardMaterial("tubeMaterial", scene);
    material.diffuseColor = color;
    material.specularColor = new BABYLON.Color3(0.2, 0.2, 0.2);
    material.emissiveColor = color.scale(0.5);
    material.backFaceCulling = false;
    tube.material = material;

    // Create label if text is provided
    if (label) {
        // Create a parent mesh for the label
        const labelRoot = new BABYLON.TransformNode("labelRoot", scene);
        labelRoot.position = new BABYLON.Vector3(
            firstPosition.x,
            firstPosition.y + labelOffset,
            firstPosition.z
        );

        const labelPlane = BABYLON.MeshBuilder.CreatePlane("labelPlane", {
            width: 1,
            height: 0.5
        }, scene);

        // Parent the plane to the root node
        labelPlane.parent = labelRoot;

        // Create dynamic texture for the label
        const texture = new BABYLON.DynamicTexture("labelTexture", {
            width: 512,
            height: 256
        }, scene);

        const labelMaterial = new BABYLON.StandardMaterial("labelMaterial", scene);
        labelMaterial.diffuseTexture = texture;
        labelMaterial.specularColor = new BABYLON.Color3(0, 0, 0);
        labelMaterial.emissiveColor = new BABYLON.Color3(1, 1, 1);
        labelMaterial.backFaceCulling = false;

        // Make the material transparent
        labelMaterial.useAlphaFromDiffuseTexture = true;
        labelMaterial.diffuseTexture.hasAlpha = true;
        labelMaterial.alpha = 1.0;

        labelPlane.material = labelMaterial;

        // Clear the texture with transparent background
        const textureContext = texture.getContext();
        textureContext.clearRect(0, 0, texture.getSize().width, texture.getSize().height);

        // Draw text on the dynamic texture
        texture.drawText(
            label,
            null,
            null,
            fontSize,
            "black",
            null,
            true,
            true
        );

        // Create a billboard behavior
        labelRoot.billboardMode = BABYLON.TransformNode.BILLBOARDMODE_ALL;

        // Store label mesh and root as properties of the tube for later access
        tube.labelMesh = labelPlane;
        tube.labelRoot = labelRoot;
    }

    return tube;
}

function createRightTriangularPrism(scene, options = {}) {
    const {
        width = 2,
        height = 2,
        depth = 2,
        flipHorizontal = false,
        flipVertical = false,
        positionY = 0,
        positionX = 0,
        color = new BABYLON.Color3(1, 1, 1) // default white
    } = options;

    const customMesh = new BABYLON.Mesh("rightPrism", scene);

    // Calculate half height for vertex positioning
    const halfHeight = height / 2;
    const halfWidth = width / 2;
    const halfDepth = depth / 2;

    // Base positions before flipping
    let basePositions = {
        leftBottom: new BABYLON.Vector3(-halfWidth, -halfHeight, halfDepth),
        rightBottom: new BABYLON.Vector3(halfWidth, -halfHeight, halfDepth),
        top: new BABYLON.Vector3(-halfWidth, halfHeight, halfDepth)
    };

    // Apply horizontal flip if requested
    if (flipHorizontal) {
        basePositions = {
            leftBottom: new BABYLON.Vector3(halfWidth, -halfHeight, halfDepth),   // Swapped x from -1.5 to 1.5
            rightBottom: new BABYLON.Vector3(-halfWidth, -halfHeight, halfDepth), // Swapped x from 1.5 to -1.5
            top: new BABYLON.Vector3(halfWidth, halfHeight, halfDepth)           // Swapped x from -1.5 to 1.5
        };
    }

    // Apply vertical flip if requested
    if (flipVertical) {
        const temp = basePositions.top.y;
        basePositions.top.y = basePositions.leftBottom.y;
        basePositions.leftBottom.y = temp;
        basePositions.rightBottom.y = temp;
    }

    // Define the vertices for front and back right triangles
    const vertices = [
        // Front triangle
        basePositions.leftBottom,                      // 0
        basePositions.rightBottom,                     // 1
        basePositions.top,                             // 2
        // Back triangle (copy of front vertices but with z = -1)
        new BABYLON.Vector3(basePositions.leftBottom.x, basePositions.leftBottom.y, -halfDepth),
        new BABYLON.Vector3(basePositions.rightBottom.x, basePositions.rightBottom.y, -halfDepth),
        new BABYLON.Vector3(basePositions.top.x, basePositions.top.y, -halfDepth)       // 5
    ];

    // Convert vertices to positions array
    const positions = [];
    vertices.forEach(vertex => {
        positions.push(vertex.x, vertex.y, vertex.z);
    });

    const indices = [
        0, 1, 2,    // front face
        3, 5, 4,    // back face
        0, 3, 1,    // bottom face
        1, 3, 4,    // right face
        0, 2, 3,    // left face
        3, 2, 5,    // left face continued
        1, 4, 2,    // hypotenuse face
        4, 5, 2     // hypotenuse face continued
    ];

    const uvs = [
        // Front
        0, 0,
        1, 0,
        0, 1,
        // Back
        0, 0,
        1, 0,
        0, 1,
    ];

    const vertexData = new BABYLON.VertexData();
    vertexData.positions = positions;
    vertexData.indices = indices;
    vertexData.uvs = uvs;

    const normals = [];
    BABYLON.VertexData.ComputeNormals(positions, indices, normals);
    vertexData.normals = normals;

    vertexData.applyToMesh(customMesh);

    const material = new BABYLON.StandardMaterial("prismMat", scene);
    material.diffuseColor = color;
    material.specularColor = new BABYLON.Color3(0, 0, 0); // Remove specular highlight
    material.ambientColor = color;  // Set ambient to same as diffuse
    material.emissiveColor = color; // Set emissive to same as diffuse
    customMesh.material = material;

    material.disableLighting = true;

    customMesh.position.x = positionX;
    customMesh.position.y = positionY;
    return customMesh;
}

function createScene(data = defaultDataSet) {
    const scene = new BABYLON.Scene(engine);
    engine.resize();
    scene.clearColor = new BABYLON.Color4(0.051, 0.792, 0.941, 1.0);

    const scale = data.length * 2.5;
    const textSize =
        "bold " +
        (data.length < 5 ? "20" : data.length < 10 ? "40" : "50") +
        "px" +
        " Roboto";

    // กล้อง
    const camera = new BABYLON.ArcRotateCamera(
        "camera",
        -Math.PI / 2,
        Math.PI / 2.5,
        data.length + 5,
        BABYLON.Vector3.Zero(),
        scene
    );
    camera.attachControl(canvas, true);
    camera.wheelPrecision = 10;

    const scaledDataset = {
        d: data.d / 1000,
        D: data.D / 1000,
        e0: parseFloat(data.e0),
        Hw: parseFloat(data.Hw),
        Z0: parseFloat(data.Z0),
        HTS: parseFloat(data.HTS),
        LTS: parseFloat(data.LTS),
        LS: parseFloat(data.LS)
    }

    // แสง
    const light = new BABYLON.HemisphericLight(
        "light",
        new BABYLON.Vector3(0, 1, 0),
        scene
    );

    const totalTimberHeight = scaledDataset.Hw + scaledDataset.HTS + scaledDataset.Z0 + scaledDataset.e0;

    // คำนวณตำแหน่งของ supportWall และ supportRight โดยอ้างอิงจาก width ของ beam
    const beamHalfWidth = (data.length - 5) / 2; // หรือใช้ beam.scaling.x / 2 หาก scaling ถูกปรับ

    // main pole
    const timberPole = BABYLON.MeshBuilder.CreateBox(
        "timberPole",
        { width: scaledDataset.d, height: totalTimberHeight, depth: scaledDataset.d },
        scene
    );
    timberPole.position.x = beamHalfWidth;
    timberPole.position.y = (totalTimberHeight / 2) - scaledDataset.Z0;
    timberPole.material = new BABYLON.StandardMaterial("wallMaterial", scene);
    timberPole.material.diffuseColor = new BABYLON.Color3(0.6, 0.6, 0.6);

    // pole after main pole
    const supportPole = BABYLON.MeshBuilder.CreateBox(
        "supportPole",
        { width: scaledDataset.d, height: totalTimberHeight - 0.5, depth: scaledDataset.d },
        scene
    );
    supportPole.position.x = scaledDataset.LS;
    supportPole.position.y = (totalTimberHeight / 2) - scaledDataset.Z0;
    supportPole.material = new BABYLON.StandardMaterial("wallMaterial", scene);
    supportPole.material.diffuseColor = new BABYLON.Color3(0.86, 0.85, 0.71);

    const afterTriangleXPos = supportPole.position.x + (scaledDataset.LTS / 2) + (scaledDataset.d / 2) + 0.01

    // after triangle
    const afterTriangle = createRightTriangularPrism(scene, {
        width: scaledDataset.LTS,
        height: totalTimberHeight - 0.25,
        depth: timberPole.scaling.z,
        positionY: supportPole.position.y + 0.125,
        positionX: afterTriangleXPos,
        flipHorizontal: false,
        color: new BABYLON.Color3(0.63, 0.62, 0.53)
    })

    // under triangle
    const underTriangle = createRightTriangularPrism(scene, {
        width: scaledDataset.LTS,
        height: scaledDataset.Z0,
        depth: (scaledDataset.d) + 1,
        positionY: -(scaledDataset.Z0 / 2) - 0.05,
        positionX: beamHalfWidth - (scaledDataset.LTS / 2) - (scaledDataset.d / 2),
        flipHorizontal: true,
        color: new BABYLON.Color3(0.63, 0.62, 0.53)
    })

    const groundWidth = ((scaledDataset.d) + 3 + scaledDataset.LTS) / 1.5;

    // ดิน
    const ground = BABYLON.MeshBuilder.CreateBox(
        "ground",
        { width: groundWidth, height: 0.1, depth: (scaledDataset.d) + 1 },
        scene
    );
    ground.position.x = -((groundWidth / 2) - scaledDataset.d / 2);
    ground.position.y = 0;
    ground.material = new BABYLON.StandardMaterial("groundMaterial", scene);

    ground.material.diffuseColor = new BABYLON.Color3(0.7, 0.48, 0.24);

    // Wall height line
    scaledDataset.Hw > 0 && createLine(scene, {
        isHorizontal: false,
        isLeft: false,
        firstPosition: { x: -groundWidth, y: scaledDataset.Hw + scaledDataset.e0 + scaledDataset.HTS + 0.05, z: 0 },
        endPosition: { x: -groundWidth, y: scaledDataset.e0 + scaledDataset.HTS, z: 0 },
        lineSlope: 0,
        color: new BABYLON.Color3(0.49, 0.31, 0.12),
        diameter: 0.03,
        label: `Wall Height (Hw): ${data.Hw}m`,
        fontSize: textSize
    })

    // depth of rotation line
    scaledDataset.Z0 > 0 && createLine(scene, {
        isHorizontal: false,
        isLeft: false,
        firstPosition: { x: -groundWidth, y: -scaledDataset.Z0, z: 0 },
        endPosition: { x: -groundWidth, y: -0.05, z: 0 },
        lineSlope: 0,
        color: new BABYLON.Color3(0.07, 0.05, 0.35),
        diameter: 0.03,
        label: `Depth of rotation (Z0): ${data.Z0}m`,
        fontSize: textSize
    })

    // HTS line
    scaledDataset.HTS > 0 && createLine(scene, {
        isHorizontal: false,
        isLeft: false,
        firstPosition: { x: -groundWidth + 0.1, y: scaledDataset.e0 + scaledDataset.HTS + 0.05, z: 0 },
        endPosition: { x: -groundWidth, y: scaledDataset.e0, z: 0 },
        lineSlope: 0,
        color: new BABYLON.Color3(0.07, 0.05, 0.35),
        diameter: 0.03,
        label: `HTS: ${data.Z0}m`,
        fontSize: textSize
    })

    // e0 line
    scaledDataset.e0 > 0 && createLine(scene, {
        isHorizontal: false,
        isLeft: false,
        firstPosition: { x: -groundWidth + 0.2, y: scaledDataset.e0 + 0.05, z: 0 },
        endPosition: { x: -groundWidth, y: 0.05, z: 0 },
        lineSlope: 0,
        color: new BABYLON.Color3(0.05, 0.33, 0.35),
        diameter: 0.03,
        label: `Inactive Zone (e0): ${data.e0}m`,
        fontSize: textSize
    })

    return scene;
}

function getBase(data, callback) {
  // set camera like createScene
  const cameraView = 5 * 2.5;
  const camera = new BABYLON.ArcRotateCamera(
    "camera",
    -Math.PI / 2,
    Math.PI / 2.5,
    cameraView,
    new BABYLON.Vector3(0, 0, 0)
  );
  camera.attachControl(canvas, true);
  camera.wheelPrecision = 20;

  // don't do anything
  scene.onReadyObservable.addOnce(() => {
    // This screenshots both objects
    // This screenshots only the ground
    BABYLON.Tools.CreateScreenshotUsingRenderTarget(
      engine,
      scene.activeCamera,
      { width: 1920, height: 1080 },
      (dataURL) => {
        callback(dataURL);
      }
    );
  });
}

function updateFunction(value) {
  scene.dispose();
  scene = createScene(value);
  engine.runRenderLoop(function () {
    scene.render();
  });
}

// ฟังก์ชันเรียกใช้ Babylon.js
function reGenerate(response) {
  const dataset = {
      length: 5,
      Hw: response['B10'], // wall height
      backslope:  response['B12'],
      toeslope: response['B13'],
      e0: response['B14'], // inactive zone
      d: response['B17'], // diameter of timber pole
      D: response['B18'], // diameter of concrete
      Z0: response['B19'], // depth of rotation
      HTS: response['J33'],
      LTS: response['B33'],
      LS: response['B11'],
  }
  scene.dispose();
  scene = createScene(dataset);
  engine.runRenderLoop(function () {
      scene.render();
  });
}