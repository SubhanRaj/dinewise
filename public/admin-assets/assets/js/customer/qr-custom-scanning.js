
const html5QrCode = new Html5Qrcode("reader");

function qrCodeSuccessCallback(decodedText, decodedResult) {
    window.location.href = decodedText
    html5QrCode.stop()
}

function onScanFailure(error) {
    console.warn(`Code scan error = ${error}`);
}


let qrboxFunction = function (viewfinderWidth, viewfinderHeight) {
    let minEdgePercentage = 0.7; // 70%
    let minEdgeSize = Math.min(viewfinderWidth, viewfinderHeight);
    let qrboxSize = Math.floor(minEdgeSize * minEdgePercentage);
    return {
        width: qrboxSize,
        height: qrboxSize
    };
}



// const setQrShaddedRegion = () => {
//     $("#reader").append(`
//     <div id="qr-shaded-region" style="position: absolute; border-width: 15.5px 62.5px; border-style: solid; border-color: rgba(0, 0, 0, 0.48); box-sizing: border-box; inset: 0px;">

//         <div style="position: absolute; background-color: rgb(255, 255, 255); width: 40px; height: 5px; top: -5px; left: 0px;"></div>
//         <div style="position: absolute; background-color: rgb(255, 255, 255); width: 40px; height: 5px; top: -5px; right: 0px;"></div>
//         <div style="position: absolute; background-color: rgb(255, 255, 255); width: 40px; height: 5px; bottom: -5px; left: 0px;"></div>
//         <div style="position: absolute; background-color: rgb(255, 255, 255); width: 40px; height: 5px; bottom: -5px; right: 0px;"></div>
//         <div style="position: absolute; background-color: rgb(255, 255, 255); width: 5px; height: 45px; top: -5px; left: -5px;"></div>
//         <div style="position: absolute; background-color: rgb(255, 255, 255); width: 5px; height: 45px; bottom: -5px; left: -5px;"></div>
//         <div style="position: absolute; background-color: rgb(255, 255, 255); width: 5px; height: 45px; top: -5px; right: -5px;"></div>
//         <div style="position: absolute; background-color: rgb(255, 255, 255); width: 5px; height: 45px; bottom: -5px; right: -5px;"></div>
    
//      </div>`)
// }


const startScanning = () => {
    $('#qr-scanner').removeClass('d-none')
    // const config = { fps: 10, qrbox: { width: 250, height: 250 } };
    const config = { fps: 10, qrbox: 250 };
    // If you want to prefer back camera
    html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
    // setQrShaddedRegion()
}




const closeQrScanner = ()=>{
    html5QrCode.stop()
    $('#qr-scanner').addClass('d-none')
}