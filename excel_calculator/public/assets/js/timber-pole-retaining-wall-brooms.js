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

  // Material
  const holematerial = new BABYLON.StandardMaterial("material", scene);
  holematerial.diffuseColor = new BABYLON.Color3(0.8, 0.8, 0.8);

  const woodMaterial = new BABYLON.StandardMaterial("woodMaterial", scene);
  woodMaterial.diffuseTexture = new BABYLON.Texture(
    "assets/image/wood-texture.jpg",
    scene
  );
  // retainer Wall
  const retainerWidth = 0.4; // D
  const retainerHeight = 4; // L

  const retainerWall = BABYLON.MeshBuilder.CreateBox(
    "retainerWall",
    { width: retainerWidth, height: retainerHeight, depth: retainerWidth },
    scene
  );
  retainerWall.material = woodMaterial;
  retainerWall.position.x = 1.5;
  // hole
  const holeWidth = 0.5; // d
  const holeHeight = 4; // H

  const holeWall = BABYLON.MeshBuilder.CreateBox(
    "holeWall",
    { width: holeWidth, height: holeHeight, depth: holeWidth },
    scene
  );
  holeWall.material = holematerial;
  // Foundation base
  //   const foundationWidth = 9;
  //   const foundationDepth = 0.5;

  //   const foundation = BABYLON.MeshBuilder.CreateBox(
  //     "foundation",
  //     { width: foundationWidth, height: foundationDepth, depth: wallDepth },
  //     scene
  //   );
  //   foundation.position.y = -foundationDepth / 2;
  //   foundation.position.z = -baseWidth / 2;

  //   // Arrows for force components
  //   const arrowSurcharge = BABYLON.MeshBuilder.CreateCylinder(
  //     "arrowSurcharge",
  //     { diameterTop: 0.05, diameterBottom: 0.1, height: 1 },
  //     scene
  //   );
  //   arrowSurcharge.rotation.z = Math.PI / 2;
  //   arrowSurcharge.position.set(-1, 3.5, 0);

  // capture
  //   BABYLON.Tools.CreateScreenshot(engine, camera, { width: 1920, height: 1080 });
  return scene;
};

//function get Base 64 to return into export
function getBase(data, callback) {
  // set camera like createScene
  const cameraView = data["C12"] < 2 ? 5 : data["C12"] * 2.5;
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
      camera,
      { width: 1920, height: 1080 },
      (dataURL) => {
        callback(dataURL);
      }
    );
  });
}

function reGenerate(response) {
  // const length = document.getElementById("C12").value;
  // const a = document.getElementById("G27").value;
  // const b = document.getElementById("H27").value;
  // const c = document.getElementById("I27").value;
  // const d = document.getElementById("J27").value;
  // const P1 = response["V19"];
  // const P2 = response["W19"];
  // const P3 = response["X19"];
  // const P4 = response["Y19"];
  // const R1 = response["G39"];
  // const R2 = response["G40"];
  // scene.dispose();
  // scene = createScene(length, a, b, c, d, P1, P2, P3, P4, R1, R2);
  engine.runRenderLoop(function () {
    scene.render();
  });
  getBase();
}
