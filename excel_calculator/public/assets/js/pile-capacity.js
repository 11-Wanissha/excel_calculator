const createScene = function () {
  const G9 = document.getElementById("G9").value / 4;
  const G28 = document.getElementById("G28").value / 4;
  const G23 = document.getElementById("G23").value;
  const dotRadius = 0.3;
  // คำนวณรัศมีวงกลมด้านนอก
  const outerRadius = Math.round((G9 / 2 / 10) * 100) / 100; // แปลงเป็น cm และปัดเศษ 2 ตำแหน่ง

  // คำนวณรัศมีวงกลมด้านใน โดยหัก G28/2/10 ออก
  const innerRadius = Math.round((outerRadius - G28 / 2 / 10) * 100) / 100; // แปลงเป็น cm และปัดเศษ 2 ตำแหน่ง

  const dotCount = G23;
  console.log(outerRadius);
  console.log(innerRadius);
  console.log(dotCount);
  const dotSpacingAngle = (2 * Math.PI) / dotCount; // มุมระหว่างจุดแต่ละจุด
  const dotPositionRadius = innerRadius - 0.5; // ระยะห่างจากขอบวงกลมด้านใน

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
    Math.PI / 2,
    cameraView,
    new BABYLON.Vector3(0, 0, 0)
  );
  camera.attachControl(canvas, true);

  // ล็อกมุมกล้อง
  camera.lowerAlphaLimit = -Math.PI / 2; // ล็อกมุม alpha (แนวนอน)
  camera.upperAlphaLimit = -Math.PI / 2;

  camera.lowerBetaLimit = Math.PI / 2; // ล็อกมุม beta (แนวตั้ง)
  camera.upperBetaLimit = Math.PI / 2;

  // ปิดการเลื่อนกล้อง (panning)
  camera.panningSensibility = 0;

  // ตั้งค่าการซูม
  camera.wheelPrecision = 20; // ปรับความไวของการซูม (ตัวเลขยิ่งสูง ยิ่งซูมช้าลง)

  // เพิ่มแสงสว่าง
  const light = new BABYLON.HemisphericLight(
    "light",
    new BABYLON.Vector3(0, 1, 0.2),
    scene
  );

  if (outerRadius > 0) {
    // สร้างวงกลมด้านนอก (สีขาว) - แสดงด้านล่างเล็กน้อย
    const outerCircle = BABYLON.MeshBuilder.CreateDisc(
      "outerCircle",
      { radius: outerRadius, tessellation: 64 },
      scene
    );
    outerCircle.position.z = -0.05; // เลื่อนลงเล็กน้อยเพื่อไม่ให้ทับกัน
    outerCircle.material = new BABYLON.StandardMaterial("outerMat", scene);
    outerCircle.material.diffuseColor = new BABYLON.Color3(1, 1, 1); // สีขาว

    if (innerRadius > 0) {
      // สร้างวงกลมด้านใน (สีแดง) - อยู่บน outer circle
      const innerCircle = BABYLON.MeshBuilder.CreateDisc(
        "innerCircle",
        { radius: innerRadius, tessellation: 64 },
        scene
      );
      innerCircle.position.z = -0.5; // เลื่อนขึ้นเล็กน้อยให้อยู่บน outer circle
      innerCircle.material = new BABYLON.StandardMaterial("innerMat", scene);
      innerCircle.material.diffuseColor = new BABYLON.Color3(1, 0, 0); // สีแดง

      // สร้างจุดสีดำรอบวงกลมด้านใน โดยอยู่ในรัศมีเล็กกว่ารัศมี inner
      for (let i = 0; i < dotCount; i++) {
        const angle = i * dotSpacingAngle; // คำนวณมุมแต่ละจุด
        const x = dotPositionRadius * Math.cos(angle); // ใช้รัศมีที่เล็กลงสำหรับตำแหน่ง
        const y = dotPositionRadius * Math.sin(angle);

        const dot = BABYLON.MeshBuilder.CreateDisc(
          `dot${i}`,
          { radius: dotRadius, tessellation: 32 },
          scene
        );
        dot.position.x = x;
        dot.position.y = y;
        dot.position.z = -0.6; // เลื่อนขึ้นเล็กน้อยให้อยู่บนวงกลมด้านใน
        dot.material = new BABYLON.StandardMaterial("dotMat", scene);
        dot.material.diffuseColor = new BABYLON.Color3(0, 0, 0); // สีดำ
      }
    }
  }

  return scene;
};

// ฟังก์ชันสำหรับสร้างภาพหน้าจอเป็น base64
function getBase(data, callback) {
  // set camera like createScene
  let cameraView = scene.activeCamera;

  // don't do anything
  scene.onReadyObservable.addOnce(() => {
    // This screenshots both objects
    // This screenshots only the ground
    BABYLON.Tools.CreateScreenshotUsingRenderTarget(
      engine,
      cameraView,
      { width: 1920, height: 1080 },
      (dataURL) => {
        callback(dataURL);
      }
    );
  });
}

function reGenerate(response) {
  // const outerRadius = response["outerRadius"]; // ปรับขนาดวงกลมด้านนอก
  // const innerRadius = response["innerRadius"]; // ปรับขนาดวงกลมด้านใน ควรมีขนาดเล็กกว่า outerRadius เล็กน้อย
  // const dotRadius = response["dotRadius"]; // ขนาดของจุดสีดำแต่ละจุด
  // const dotCount = response["dotCount"]; // จำนวนจุดสีดำรอบวงกลมด้านใน
  scene = createScene();
  engine.runRenderLoop(function () {
    scene.render();
  });
}
