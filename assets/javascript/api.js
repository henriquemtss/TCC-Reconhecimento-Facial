const cam = document.getElementById('cam')

const startVideo = () => {
        // navigator.mediaDevices.getUserMedia({video: true}).then(function (mediaStream) {
    //     const video = document.querySelector('#video');
    //     video.srcObject = mediaStream;
    //     video.play();
    // });
    navigator.mediaDevices.enumerateDevices()
    .then(devices => {
        console.log(devices)
        if (Array.isArray(devices)) {
           
            devices.forEach(device => {
                if(device.kind == 'videoinput'){
                    
                    console.log(device);
                    //if(device.label.includes('VGA WebCam (04f2:b5e0)')){                           
                        navigator.getUserMedia(
                            {video: {
                                deviceId: device.deviceId,
                            }},
                            stream => cam.srcObject = stream,
                            error => console.log(error)
                        )
                    //}
                }
            })
        }
    })
}
//     navigator.getUserMedia (
        
//         {
//            video: true,
//            audio: true
//         }, 
        
//         function() {
//             navigator.mediaDevices.enumerateDevices()
//             .then(devices => {
//                 console.log(devices)
//                 if (Array.isArray(devices)) {
                   
//                     devices.forEach(device => {
//                         if(device.kind == 'videoinput'){
                            
//                             console.log(device);
//                             if(device.label.includes('VGA WebCam (04f2:b5e0)')){                           
//                                 navigator.getUserMedia(
//                                     {video: {
//                                         deviceId: device.deviceId,
//                                     }},
//                                     stream => cam.srcObject = stream,
//                                     error => console.log(error)
//                                 )
//                             }
//                         }
//                     })
//                 }
//             })
//         },
        
//         function(err) {
//          console.log("O seguinte erro ocorreu: " + err);
//         }
//     );
// }

const loadLabels = () => {
  
    const labels = ['1', '2', '3', '4', '5']
    return Promise.all(labels.map(async label => {
        const descriptions = []
        for (let i = 1; i <= 3; i++) {
            const img = await faceapi.fetchImage(`../assets/lib/face-api/labels/${label}/${i}.jpg`)
            const detections = await faceapi
                .detectSingleFace(img)
                .withFaceLandmarks()
                .withFaceDescriptor()
            descriptions.push(detections.descriptor)
        }
        if (label === "1") {
            label = "margot robbie"
        } else if (label === "2") {
            label = "Arnold Schwarzenegger"
        } else if (label === "3") {
            label = "Neymar"
        } 
        else if (label === "4") {
            label = "Henrique"
        } 
        else if (label === "5") {
            label = "Marcio"
        } 

        return new faceapi.LabeledFaceDescriptors(label, descriptions)
    }))
}

Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('../assets/lib/face-api/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('../assets/lib/face-api/models'),
    faceapi.nets.faceRecognitionNet.loadFromUri('../assets/lib/face-api/models'),
    faceapi.nets.ssdMobilenetv1.loadFromUri('../assets/lib/face-api/models'),
]).then(startVideo)

cam.addEventListener('play', async () => {
    const canvas = faceapi.createCanvasFromMedia(cam)
    const canvasSize = {
        width: cam.width,
        height: cam.height - 33
    }

    videoArea = document.querySelector(".area")
    const labels = await loadLabels()
    faceapi.matchDimensions(canvas, canvasSize)
    videoArea.appendChild(canvas)
    setInterval(async () => {
        const detections = await faceapi
            .detectAllFaces(
                cam, 
                new faceapi.TinyFaceDetectorOptions()
            )
            .withFaceLandmarks()
            .withFaceDescriptors()
        
        const resizedDetections = faceapi.resizeResults(detections, canvasSize)
        const faceMatcher = new faceapi.FaceMatcher(labels, 0.3)
        const results = resizedDetections.map(d =>
            faceMatcher.findBestMatch(d.descriptor),
        )
        canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
        faceapi.draw.drawDetections(canvas, resizedDetections)
        
        results.forEach((result, index) => {
            const box = resizedDetections[index].detection.box
            const {label} = result
            new faceapi.draw.DrawTextField([
                `${label}`
            ], box.bottomRight).draw(canvas)
        })
    }, 100) 
})
