const createScene = function (
  outerRadius = 0, // ปรับขนาดวงกลมด้านนอก
  innerRadius = 0 ,// ปรับขนาดวงกลมด้านใน ควรมีขนาดเล็กกว่า outerRadius เล็กน้อย
  dotRadius = 0, // ขนาดของจุดสีดำแต่ละจุด
  // dotCount = 2, // จำนวนจุดสีดำรอบวงกลมด้านใน

) {
  // const outerRadius = 7.5; // ปรับขนาดวงกลมด้านนอก
  // const innerRadius = 6; // ปรับขนาดวงกลมด้านใน ควรมีขนาดเล็กกว่า outerRadius เล็กน้อย
  // const dotRadius = 0.2; // ขนาดของจุดสีดำแต่ละจุด
  const dotCount = 2; // จำนวนจุดสีดำรอบวงกลมด้านใน
  const dotSpacingAngle = (2 * Math.PI) / dotCount; // มุมระหว่างจุดแต่ละจุด
  const dotPositionRadius = innerRadius - 0.3; // กำหนดรัศมีที่เล็กลงเพื่อจัดตำแหน่งจุด

  // คำนวณการซูมของกล้องตามขนาดของ outerRadius
  const scale = outerRadius * 2.5;
  const cameraView = outerRadius < 2 ? 5 : scale;

  // สร้าง Scene ของ Babylon.js
  const scene = new BABYLON.Scene(engine);
  scene.clearColor = new BABYLON.Color4(0.051, 0.792, 0.941, 1.0); // สีพื้นหลัง

  // ตั้งค่ากล้อง
  const camera = new BABYLON.ArcRotateCamera(
    "camera",
    -Math.PI / 2,
    Math.PI / 2.5,
    cameraView,
    new BABYLON.Vector3(0, 0, 0)
  );
  camera.attachControl(canvas, true);
  camera.wheelPrecision = 20;

  // เพิ่มแสงสว่าง
  const light = new BABYLON.HemisphericLight(
    "light",
    new BABYLON.Vector3(0, 1, 0.2),
    scene
  );

  // สร้างวงกลมด้านนอก (สีขาว) - แสดงด้านล่างเล็กน้อย
  const outerCircle = BABYLON.MeshBuilder.CreateDisc("outerCircle", { radius: outerRadius, tessellation: 64 }, scene);
  outerCircle.position.z = -0.05; // เลื่อนลงเล็กน้อยเพื่อไม่ให้ทับกัน
  outerCircle.material = new BABYLON.StandardMaterial("outerMat", scene);
  outerCircle.material.diffuseColor = new BABYLON.Color3(1, 1, 1); // สีขาว

  // สร้างวงกลมด้านใน (สีแดง) - อยู่บน outer circle
  const innerCircle = BABYLON.MeshBuilder.CreateDisc("innerCircle", { radius: innerRadius, tessellation: 64 }, scene);
  innerCircle.position.z = -0.5; // เลื่อนขึ้นเล็กน้อยให้อยู่บน outer circle
  innerCircle.material = new BABYLON.StandardMaterial("innerMat", scene);
  innerCircle.material.diffuseColor = new BABYLON.Color3(1, 0, 0); // สีแดง

  // สร้างจุดสีดำรอบวงกลมด้านใน โดยอยู่ในรัศมีเล็กกว่ารัศมี inner
  for (let i = 0; i < dotCount; i++) {
    const angle = i * dotSpacingAngle; // คำนวณมุมแต่ละจุด
    const x = dotPositionRadius * Math.cos(angle); // ใช้รัศมีที่เล็กลงสำหรับตำแหน่ง
    const y = dotPositionRadius * Math.sin(angle);
    
    const dot = BABYLON.MeshBuilder.CreateDisc(`dot${i}`, { radius: dotRadius, tessellation: 32 }, scene);
    dot.position.x = x;
    dot.position.y = y;
    dot.position.z = -0.6; // เลื่อนขึ้นเล็กน้อยให้อยู่บนวงกลมด้านใน
    dot.material = new BABYLON.StandardMaterial("dotMat", scene);
    dot.material.diffuseColor = new BABYLON.Color3(0, 0, 0); // สีดำ
  }

  return scene;
};




// ฟังก์ชันสำหรับสร้างภาพหน้าจอเป็น base64
function getBase(data, callback) {
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

  scene.onReadyObservable.addOnce(() => {
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
  const outerRadius = response["outerRadius"]; // ปรับขนาดวงกลมด้านนอก
  const innerRadius = response["innerRadius"]; // ปรับขนาดวงกลมด้านใน ควรมีขนาดเล็กกว่า outerRadius เล็กน้อย
  const dotRadius = response["dotRadius"]; // ขนาดของจุดสีดำแต่ละจุด
  const dotCount = response["dotCount"]; // จำนวนจุดสีดำรอบวงกลมด้านใน
  console.log(response["outerRadius"]);
  console.log(response["innerRadius"]);
  console.log(response["dotRadius"]);
  console.log(response["dotCount"]);
  scene = createScene(outerRadius,innerRadius,dotRadius);
  engine.runRenderLoop(function () {
    scene.render();
  });
}
