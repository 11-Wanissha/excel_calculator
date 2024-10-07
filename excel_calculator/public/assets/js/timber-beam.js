const createScene = function (
  length = 0,
  a = 0,
  b = 0,
  c = 0,
  d = 0,
  P1 = 0,
  P2 = 0,
  P3 = 0,
  P4 = 0,
  R1 = 0,
  R2 = 0
) {
  const scale = length * 2.5;
  const cameraView = length < 2 ? 5 : scale;
  const textSize =
    "bold " +
    (length < 5 ? "30" : length < 10 ? "44" : "50") +
    "px" +
    " Roboto";
  // This creates a basic Babylon Scene object (non-mesh)
  const scene = new BABYLON.Scene(engine);
  scene.clearColor = new BABYLON.Color4(0.051, 0.792, 0.941, 1.0);

  const camera = new BABYLON.ArcRotateCamera(
    "camera",
    -Math.PI / 2,
    Math.PI / 2.5,
    cameraView,
    new BABYLON.Vector3(0, 0, 0)
  );
  camera.attachControl(canvas, true);
  camera.wheelPrecision = 20;

  // Coding Model Here
  const light = new BABYLON.HemisphericLight(
    "light",
    new BABYLON.Vector3(0, 1, 0.2)
  );

  const woodMaterial = new BABYLON.StandardMaterial("woodMaterial", scene);
  woodMaterial.diffuseTexture = new BABYLON.Texture(
    "assets/image/wood-texture.jpg",
    scene
  );

  const box = BABYLON.MeshBuilder.CreateBox("box", {});
  box.scaling.set(scale, 1, 0.3);
  box.material = woodMaterial;
  box.position.y = 0.15;
  const linePoints = [
    new BABYLON.Vector3(0, 0.8, 0), // Starting point above the box
    new BABYLON.Vector3(0, 0.2, 0) // Pointing to the box
  ];
  const createLine = (
    name,
    xOffset,
    above = true,
    left = true,
    horizon = false,
    positionY = 0
  ) => {
    if (horizon) {
      points = [
        new BABYLON.Vector3(-(box.scaling.x / 2), 0, 0), // Start at the box's start
        new BABYLON.Vector3(-(box.scaling.x / 2) + xOffset * 2.4, 0, 0) // End at xOffset
      ];
      const tube = BABYLON.MeshBuilder.CreateLines(
        name,
        { points: points },
        scene
      );

      // Set line color
      tube.color = new BABYLON.Color3.Red(); // Green color
      tube.position.y = positionY ?? 0;
      let positionX = points[0].x - 0.6;
      return { tube, above, horizon, positionY, positionX };
    } else {
      const tube = BABYLON.MeshBuilder.CreateTube(
        name,
        {
          path: linePoints,
          radius: 0.015, // Adjust thickness here
          tessellation: 16 // Number of segments in the circular cross-section
        },
        scene
      );

      const tubeMaterial = new BABYLON.StandardMaterial(
        name + "Material",
        scene
      );
      if (above) {
        tubeMaterial.diffuseColor = BABYLON.Color3.Green();
        // Position the tube
        tube.position.y = box.scaling.y / 2 + 0.1;
        tube.position.x = -(box.scaling.x / 2) + xOffset * 2.5;
      } else {
        tubeMaterial.diffuseColor = BABYLON.Color3.Green();
        // Position the tube
        tube.position.y = box.scaling.y / 2 - 1.6;
        if (left) {
          tube.position.x = -(box.scaling.x / 2) + 0;
        } else {
          tube.position.x = -(box.scaling.x / 2) + scale;
        }
      }
      tube.material = tubeMaterial;
      return { tube, above, horizon, positionY };
    }
  };

  const createLabel = (name, text) => {
    const dynamicTexture = new BABYLON.DynamicTexture(
      name,
      { width: 512, height: 256 },
      scene
    );
    dynamicTexture.hasAlpha = true;
    dynamicTexture.drawText(
      text,
      null,
      null,
      textSize,
      "black",
      "transparent",
      true
    );

    const labelMaterial = new BABYLON.StandardMaterial(
      `labelMaterial${name}`,
      scene
    );
    labelMaterial.diffuseTexture = dynamicTexture;
    labelMaterial.backFaceCulling = false;

    const label = BABYLON.MeshBuilder.CreatePlane(
      `label${name}`,
      { size: 1.5 },
      scene
    );
    label.material = labelMaterial;
    label.billboardMode = BABYLON.Mesh.BILLBOARDMODE_ALL;
    return label;
  };
  const line = [
    createLine("lineP1", a, true, true, false,  0.7),
    createLine("lineP2", b, true, true, false,  0.95),
    createLine("lineP3", c, true, true, false,  1.2),
    createLine("lineP4", d, true, true, false, 1.4),
    createLine("lineR1", R1, false),
    createLine("lineR2", R2, false, false),
    createLine("a", a, true, true, true, 1.1),
    createLine("b", b, true, true, true, 1.75),
    createLine("c", c, true, true, true, 2),
    createLine("d", d, true, true, true, 2.25)
  ];
  const labels = [
    createLabel("P1", "P1 : " + P1),
    createLabel("P2", "P2 : " + P2),
    createLabel("P3", "P3 : " + P3),
    createLabel("P4", "P4 : " + P4),
    createLabel("R1", "R1 : " + R1),
    createLabel("R2", "R2 : " + R2),
    createLabel("a", "a : " + a),
    createLabel("b", "b : " + b),
    createLabel("c", "c : " + c),
    createLabel("d", "d : " + d)
  ];
  const scaling = new BABYLON.Vector3(2, 1, 1);
  const updateLabelPosition = () => {
    line.forEach(({ tube, above, horizon, positionY, positionX }, index) => {
      const label = labels[index];
      if (label) {
        label.scaling = scaling;
        label.position.copyFrom(tube.position); // Align label position with line
        if (horizon) {
          label.position.x = positionX;
          label.position.y = positionY;
        } else if (above) {
          label.position.y = linePoints[0].y + positionY; // Slightly above the line
        }
      }
    });
  };

  // Initial update to align the labels with the lines
  updateLabelPosition();

  // Optionally, you can animate or move the lines and update the labels' positions accordingly
  scene.registerBeforeRender(updateLabelPosition);

  // Coding Model Here

  return scene;
};

function reGenerate(response) {
  const length = document.getElementById("C12").value;
  const a = document.getElementById("G27").value;
  const b = document.getElementById("H27").value;
  const c = document.getElementById("I27").value;
  const d = document.getElementById("J27").value;
  const P1 = response["V19"];
  const P2 = response["W19"];
  const P3 = response["X19"];
  const P4 = response["Y19"];
  const R1 = response["G39"];
  const R2 = response["G40"];
  scene.dispose();
  scene = createScene(length, a, b, c, d, P1, P2, P3, P4, R1, R2);
  engine.runRenderLoop(function () {
    scene.render();
  });
}