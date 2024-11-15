const createScene = function (data) {
  if (!data) {
    data = {
      H: 0,
      L: 0,
      d: 0,
      D: 0
    };
  }
  let cameraView;
  if (data.H > data.L) {
    if (data.H >= 2) {
      cameraView = data.H * 6;
    } else {
      cameraView = 12;
    }
  } else {
    if (data.L >= 2) {
      cameraView = data.L;
    } else {
      cameraView = 12;
    }
  }
  // This creates a basic Babylon Scene object (non-mesh)
  const scene = new BABYLON.Scene(engine);
  scene.clearColor = new BABYLON.Color4(0.051, 0.792, 0.941, 1.0);

  const camera = new BABYLON.ArcRotateCamera(
    "camera",
    -Math.PI / 2,
    Math.PI / 2.2,
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
  // hole
  const holeWidth = (data.D / 1000) * 1.5; // d
  const holeHigh = data.L * 1.5; // L

  const holeWall = BABYLON.MeshBuilder.CreateBox(
    "holeWall",
    { width: holeWidth, height: holeHigh, depth: 10 + holeWidth },
    scene
  );
  holeWall.material = holematerial;
  holeWall.position.x = 0;

  // retainer Wall
  const retainerWidth = (data.d / 1000) * 1.5; // D
  const retainerHigh = (data.H * 1.5) + 0.5; // H

  if (data.H > 0) {
    const retainerWall = BABYLON.MeshBuilder.CreateBox(
      "retainerWall",
      { width: retainerWidth, height: retainerHigh, depth: 10 + retainerWidth },
      scene
    );
    retainerWall.material = woodMaterial;
    retainerWall.position.x = 0;
    retainerWall.position.y =
      holeWall.position.y -
      holeHigh / 2 +
      retainerHigh / 2 +
      (holeWidth / 2 - retainerWidth / 2);
  }

  const grass = BABYLON.MeshBuilder.CreateBox(
    "grass",
    { width: 5, height: 0.1, depth: 10 + retainerWidth },
    scene
  );
  grass.position.x = holeWidth / 2 + 5 / 2;
  grass.position.y = holeWall.position.y + holeHigh / 2 - 0.1 / 2;
  grass.material = new BABYLON.StandardMaterial("grassMaterial", scene);
  grass.material.diffuseColor = new BABYLON.Color3(0.36, 0.69, 0.22);

  const soil = BABYLON.MeshBuilder.CreateBox(
    "soilbox",
    { width: 5, height: holeHigh - 0.1, depth: 10 + retainerWidth },
    scene
  );
  soil.position.x = holeWidth / 2 + 5 / 2;
  soil.position.y = grass.position.y - (0.1 / 2 + (holeHigh - 0.1) / 2);
  soil.material = new BABYLON.StandardMaterial("groundMaterial", scene);
  soil.material.diffuseColor = new BABYLON.Color3(0.7, 0.48, 0.24);

  if (data.H > 0) {
    const soilForce = BABYLON.MeshBuilder.CreateBox(
      "soilbox",
      { width: 5, height: retainerHigh, depth: 10 + retainerWidth },
      scene
    );
    soilForce.position.x = -(holeWidth / 2 + 5 / 2);
    soilForce.position.y =
      holeWall.position.y -
      holeHigh / 2 +
      retainerHigh / 2 +
      (holeWidth / 2 - retainerWidth / 2);
    soilForce.material = new BABYLON.StandardMaterial("groundMaterial", scene);
    soilForce.material.diffuseColor = new BABYLON.Color3(0.7, 0.48, 0.24);
  }
  return scene;
};
function updateFunction(value) {
  scene.dispose();
  scene = createScene(value);
  engine.runRenderLoop(function () {
    scene.render();
  });
}
//function get Base 64 to return into export
function getBase(data, callback) {
  // set camera like createScene
  let cameraView;
  cameraView = scene.activeCamera;
  if (!cameraView) {
    if (data["B9"] > data["B10"]) {
      if (data["B9"] >= 2) {
        cameraView = data["B9"] * 6;
      } else {
        cameraView = 12;
      }
    } else {
      if (data["B10"] >= 2) {
        cameraView = data["B10"] * 6;
      } else {
        cameraView = 12;
      }
    }
  }
  const camera = new BABYLON.ArcRotateCamera(
    "camera",
    -Math.PI / 2,
    Math.PI / 2.2,
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
  scene = createScene(response);
  engine.runRenderLoop(function () {
    scene.render();
  });
}
