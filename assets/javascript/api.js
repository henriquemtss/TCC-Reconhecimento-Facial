const cam = document.getElementById('cam')

const startVideo = () => {
    navigator.mediaDevices.enumerateDevices()
    .then(devices => {
        console.log(devices)
        if (Array.isArray(devices)) {
           
            devices.forEach(device => {
                if(device.kind == 'videoinput'){
                    console.log(device);                        
                    navigator.getUserMedia(
                        {video: {
                            deviceId: device.deviceId,
                        }},
                        stream => cam.srcObject = stream,
                        error => console.log(error)
                    )
                }
            })
        }
    })
}

const loadLabels = () => {
    alert(sessionStorage.getItem("folders"));
    const labels = JSON.parse(sessionStorage.getItem("folders"));
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
        const faceMatcher = new faceapi.FaceMatcher(labels, 0.6)
        const results = resizedDetections.map(d =>
            faceMatcher.findBestMatch(d.descriptor),
        )
        canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
        faceapi.draw.drawDetections(canvas, resizedDetections)
        
        results.forEach((result, index) => {
            const box = resizedDetections[index].detection.box
            const {label} = result

            // Buscar RM no Banco
            var nome;
            var request = new XMLHttpRequest();
		    request.open('POST', '../model/busca_pessoa.php', true);
		    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		    request.onload = function() {
			if (request.status >= 200 && request.status < 400) {
                console.log(request.responseText);
                var nome = JSON.parse(request.responseText);
                document.getElementById("nome").value = JSON.parse(request.responseText).nome;
                document.getElementById("periodo").style.display = 'block';
                document.getElementById("curso").style.display = 'block';
                document.getElementById('rm').style.display = 'block';
                document.getElementById("funcao").style.display = 'none';
                document.getElementById("periodo").value = JSON.parse(request.responseText).periodo;
                document.getElementById("curso").value = JSON.parse(request.responseText).curso;
                if (JSON.parse(request.responseText).rm > 1 && JSON.parse(request.responseText).rm < 100000) {
                    document.getElementById("rm").value = JSON.parse(request.responseText).rm;
                } else if (JSON.parse(request.responseText).cpf > 99999) {
                    document.getElementById("funcao").style.display = 'block';
                    document.getElementById("funcao").value = JSON.parse(request.responseText).funcao;
                    document.getElementById('periodo').style.display = 'none';
                    document.getElementById('rm').style.display = 'none';
                    document.getElementById('curso').style.display = 'none';
                } else {
                    document.getElementById("rm").value = ""
                }
                
				if(nome.error){
					alert(nome.error);
					return false;
			    }
			} else {
				alert( "Erro ao localizar. Tipo:" + request.status );
			}
            };
            request.onerror = function() {
                alert("Erro ao localizar. Back-End inacessível.");
            }
            //alert(label);
            if (label > 1) {
                request.send("RM="+label);
            } else {
                request.send("RM="+1);
            }

            time = null;
            if (label != "unknown") {
                nome = document.getElementById("nome").value;
                if (document.getElementById('rm').value != "") {
                    clearTimeout(time);
                        time = setTimeout(function(){
                            registro();
                            }, 3000);
                        console.log(document.getElementById('rm').value)
                }
            } else if (label == "unknown"){
                nome = "Não Encontrado";
                clearTimeout(time)
            } else {
                nome = "Aguardando Rosto...";
                clearTimeout(time)
            }
            //

            new faceapi.draw.DrawTextField([
                `${nome}`
            ], box.bottomRight).draw(canvas)
        })
    }, 100) 
})
