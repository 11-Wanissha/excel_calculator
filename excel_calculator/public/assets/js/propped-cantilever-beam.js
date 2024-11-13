function createScene() {
  const scene = new BABYLON.Scene(engine);
  scene.clearColor = new BABYLON.Color4(0.051, 0.792, 0.941, 1.0);
  const data = {
    length: 10,
    P1: 2.4,
    P2: 3.2,
    P3: 4.0,
    P4: 6.2,
    Ra: 226.9,
    Rb: 119.0,
    q: 10.5,
  };
  const textSize =
    "bold " +
    (data.length < 5 ? "20" : data.length < 10 ? "34" : "40") +
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

  // แสง
  const light = new BABYLON.HemisphericLight(
    "light",
    new BABYLON.Vector3(0, 1, 0),
    scene
  );

  // สร้างคาน
  const beam = BABYLON.MeshBuilder.CreateBox(
    "beam",
    { width: data.length, height: 0.5, depth: 0.3 },
    scene
  );
  beam.position.y = 2;
  beam.position.x = 0;
  beam.material = new BABYLON.StandardMaterial("beamMaterial", scene);
  beam.material.diffuseColor = new BABYLON.Color3(0.8, 0.8, 0.8);

  // คำนวณตำแหน่งของ supportWall และ supportRight โดยอ้างอิงจาก width ของ beam
  const beamHalfWidth = data.length / 2; // หรือใช้ beam.scaling.x / 2 หาก scaling ถูกปรับ

  // สร้างกำแพงรองรับด้านซ้าย
  const supportWall = BABYLON.MeshBuilder.CreateBox(
    "supportWall",
    { width: 0.9, height: 3, depth: 3 },
    scene
  );
  supportWall.position.x = -beamHalfWidth - 0.45;
  supportWall.position.y = 1.2;
  supportWall.material = new BABYLON.StandardMaterial("wallMaterial", scene);
  supportWall.material.diffuseColor = new BABYLON.Color3(0.6, 0.6, 0.6);

  // สร้างจุดรองรับด้านขวา
  const supportRight = BABYLON.MeshBuilder.CreateCylinder(
    "supportRight",
    { diameter: 0.8, height: 1.2 },
    scene
  );
  supportRight.position.x = beamHalfWidth + 0.4;
  supportRight.position.y = 1.7;
  supportRight.material = new BABYLON.StandardMaterial(
    "supportMaterial",
    scene
  );
  supportRight.material.diffuseColor = new BABYLON.Color3(0.9, 0.4, 0.4);

  // สร้างหญ้ารองรับด้านขวา
  const supportgrassRight = BABYLON.MeshBuilder.CreateBox(
    "supportgrassRight",
    { width: 1.5, height: 0.2, depth: 2 },
    scene
  );
  supportgrassRight.position.x = supportRight.position.x;
  supportgrassRight.position.y = 1.25;
  supportgrassRight.material = new BABYLON.StandardMaterial(
    "grassMaterial",
    scene
  );
  supportgrassRight.material.diffuseColor = new BABYLON.Color3(0.2, 0.84, 0.25);

  // สร้างดินรองรับด้านขวา
  const supportgroundRight = BABYLON.MeshBuilder.CreateBox(
    "supportgroundRight",
    { width: 1.5, height: 1.5, depth: 2 },
    scene
  );
  supportgroundRight.position.x = supportRight.position.x;
  supportgroundRight.position.y = 0.4;
  supportgroundRight.material = new BABYLON.StandardMaterial(
    "groundMaterial",
    scene
  );
  supportgroundRight.material.diffuseColor = new BABYLON.Color3(
    0.64,
    0.46,
    0.13
  );

  const grassWidth = data.length + 5; // ใช้ค่าความกว้างของ beam + 1

  // สร้างหญ้า
  const grass = BABYLON.MeshBuilder.CreateBox(
    "grass",
    { width: grassWidth, height: 0.1, depth: 3 },
    scene
  );
  grass.position.x = -0.2;
  grass.position.y = 0;
  grass.material = new BABYLON.StandardMaterial("grassMaterial", scene);
  grass.material.diffuseColor = new BABYLON.Color3(0.36, 0.69, 0.22);

  // ดิน
  const ground = BABYLON.MeshBuilder.CreateBox(
    "ground",
    { width: grassWidth, height: 0.3, depth: 3 },
    scene
  );
  ground.position.x = -0.2;
  ground.position.y = -0.2;
  ground.material = new BABYLON.StandardMaterial("groundMaterial", scene);
  ground.material.diffuseColor = new BABYLON.Color3(0.7, 0.48, 0.24);

  const linePoints = [
    new BABYLON.Vector3(0, 0.8, 0), // Starting point above the box
    new BABYLON.Vector3(0, 0.2, 0) // Pointing to the box
  ];

  // ฟังก์ชันสร้างเส้น (tube)
  const createLine = (
    name,
    xOffset,
    above = true,
    left = true,
    positionY = 0
  ) => {
     // Define line points for the tube path

    const tube = BABYLON.MeshBuilder.CreateTube(
      name,
      {
        path: linePoints,
        radius: 0.015,
        tessellation: 16,
      },
      scene
    );

    const tubeMaterial = new BABYLON.StandardMaterial(name + "Material", scene);
    tubeMaterial.diffuseColor = BABYLON.Color3.Green();
    tube.material = tubeMaterial;
    if (above) {
      tubeMaterial.diffuseColor = BABYLON.Color3.Green();
      // Position the tube
      tube.position.y = beam.position.y + 0.5;
      tube.position.x = -(data.length / 2) + xOffset;
    } else {
      tubeMaterial.diffuseColor = BABYLON.Color3.Green();
      // Position the tube
      tube.position.y = beam.position.y - 3.6;
      if (left) {
        tube.position.x = supportWall.position.x;
      } else {
        tube.position.x = supportRight.position.x;
      }
    }
    tube.material = tubeMaterial;
    return { tube, above, positionY };
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
    createLine("leftSupportLine", 0, false, true), // ฝั่งซ้ายที่ supportWall
    createLine("rightSupportLine", 0, false, false), // ฝั่งขวาที่ supportRight
    createLine("P1", data.P1, true, false,2.8), // ฝั่งขวาที่ supportRight
    createLine("P2", data.P2, true, false,3.0), // ฝั่งขวาที่ supportRight
    createLine("P3", data.P3, true, false,3.2), // ฝั่งขวาที่ supportRight
    createLine("P4", data.P4, true, false,3.4), // ฝั่งขวาที่ supportRight
    createLine("q", data.length+0.5, true, false,2.7), // ฝั่งขวาที่ supportRight
  ];
  const labels = [
    createLabel("Ra", "Ra : " + data.Ra),
    createLabel("Rb", "Rb : " + data.Rb),
    createLabel("P1", "P1 : " + data.P1),
    createLabel("P2", "P2 : " + data.P2),
    createLabel("P3", "P3 : " + data.P3),
    createLabel("P4", "P4 : " + data.P4),
    createLabel("q", "q : " + data.q),
    
  ];
  const scaling = new BABYLON.Vector3(2, 1, 1);
  const updateLabelPosition = () => {
    line.forEach(({ tube, above, positionY }, index) => {
      const label = labels[index];
      if (label) {
        label.scaling = scaling;
        label.position.copyFrom(tube.position); // Align label position with line
        if (above) {
          label.position.y = linePoints[0].y + positionY; // Slightly above the line
        }
      }
    });
  };
  updateLabelPosition();
  scene.registerBeforeRender(updateLabelPosition);

  return scene;
}

// ฟังก์ชันเรียกใช้ Babylon.js
function reGenerate(response) {
  engine.runRenderLoop(function () {
    scene.render();
  });
}
