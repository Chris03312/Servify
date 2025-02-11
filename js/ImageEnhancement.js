$(document).ready(function () {
    let idFormats = {};

    // Load JSON File
    $.getJSON("../configuration/id_formats.json", function (data) {
        idFormats = data;
    });

    $('#nameofId').on('change', function () {
        let selectedID = $('#nameofId').val();
        let inputField = $('input[name="IDNumber"]');

        if (selectedID && idFormats[selectedID]) {
            inputField.prop('disabled', false);
            inputField.attr('placeholder', "e.g. " + idFormats[selectedID].example);
            inputField.val('');
        } else {
            inputField.prop('disabled', true);
            inputField.attr('placeholder', "Select ID type first");
            inputField.val('');
        }
    });

    $('input[name="IDNumber"]').on('input', function () {
        let selectedID = $('#nameofId').val();
        let inputValue = $(this).val();

        if (selectedID && idFormats[selectedID]) {
            let regex = new RegExp(idFormats[selectedID].format);
            
            if (regex.test(inputValue)) {
                $(this).removeClass("is-invalid").addClass("is-valid");
            } else {
                $(this).removeClass("is-valid").addClass("is-invalid");
            }
        }
    });
});


document.addEventListener("DOMContentLoaded", function () {
    console.log("✅ DOM fully loaded and script running.");

    let fileInput = document.getElementById("file-input");
    let imgPreview = document.getElementById("preview");
    let errorValidId = document.getElementById("error-validId");
    let idNumberInput = document.getElementById("IDNumber");
    let submitButton = document.getElementById("submitBtn");

    let loadingIndicator = document.createElement("p");
    loadingIndicator.id = "loading-indicator";
    loadingIndicator.textContent = "⏳ Scanning ID...";
    loadingIndicator.style.color = "blue";
    loadingIndicator.style.fontWeight = "bold";
    loadingIndicator.style.display = "none";
    imgPreview.appendChild(loadingIndicator);

    if (!fileInput || !idNumberInput) {
        console.error("❌ file-input or IDNumber input field not found!");
        return;
    }

    fileInput.addEventListener("change", function (event) {
        console.log("📂 File selected for upload.");
        let file = event.target.files[0];

        if (file) {
            console.log("📷 File detected: ", file.name);
            loadingIndicator.style.display = "block";

            let reader = new FileReader();
            reader.onload = function (e) {
                let img = new Image();
                img.src = e.target.result;

                img.onload = function () {
                    let canvas = document.createElement("canvas");
                    let ctx = canvas.getContext("2d");
                    let scaleFactor = 3.5;
                    canvas.width = img.width * scaleFactor;
                    canvas.height = img.height * scaleFactor;
                    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                    let imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                    let data = imageData.data;
                    for (let i = 0; i < data.length; i += 4) {
                        let avg = (data[i] + data[i + 1] + data[i + 2]) / 3;
                        data[i] = avg;
                        data[i + 1] = avg;
                        data[i + 2] = avg;
                    }
                    ctx.putImageData(imageData, 0, 0);

                    function calculateAdaptiveThreshold(imageData) {
                        let data = imageData.data;
                        let total = 0, count = 0;
                        for (let i = 0; i < data.length; i += 4) {
                            total += data[i];
                            count++;
                        }
                        return total / count - 15;
                    }

                    let threshold = calculateAdaptiveThreshold(imageData);
                    for (let i = 0; i < data.length; i += 4) {
                        let gray = data[i];
                        let newValue = gray > threshold ? 255 : 0;
                        data[i] = newValue;
                        data[i + 1] = newValue;
                        data[i + 2] = newValue;
                    }
                    ctx.putImageData(imageData, 0, 0);

                    let enhancedImage = canvas.toDataURL("image/jpeg", 0.9);
                    imgPreview.innerHTML = `<img src="${enhancedImage}" class="img-fluid" width="450">`;
                    imgPreview.appendChild(loadingIndicator);

                    console.log("🔍 Enhanced image ready for OCR.");

                    Tesseract.recognize(enhancedImage, 'eng', {
                        logger: (m) => {
                            console.log("📊 OCR Progress:", m);
                            loadingIndicator.textContent = `📊 Scanning: ${Math.round(m.progress * 100)}%`;
                        }
                    }).then(({ data: { text } }) => {
                        console.log("📜 Extracted Text:", text);
                        loadingIndicator.style.display = "none";

                        let extractedIds = text.match(/\d{4}-\d{4}-\d{4}-\d{4}/g);
                        let scannedId = extractedIds ? extractedIds[0] : null;

                        if (scannedId) {
                            console.log("✅ Scanned ID Number:", scannedId);
                            let enteredId = idNumberInput.value.trim();

                            function fixCommonOcrErrors(scannedId) {
                                return scannedId.replace(/8/g, "0").replace(/5/g, "6");
                            }

                            let correctedScannedId = fixCommonOcrErrors(scannedId);
                            idNumberInput.value = correctedScannedId; 
                            
                            if (enteredId === correctedScannedId) {
                                console.log("✅ ID Matched!");
                                errorValidId.textContent = "✅ ID Matched!";
                                errorValidId.style.color = "green";
                                submitButton.disabled = false;
                            } else {
                                console.warn("⚠️ Mismatch detected!");
                                errorValidId.textContent = "❌ ID mismatch detected!";
                                errorValidId.style.color = "red";
                                submitButton.disabled = true;
                            }
                        } else {
                            console.error("❌ No valid ID number detected.");
                            errorValidId.textContent = "❌ No valid ID detected.";
                            errorValidId.style.color = "red";
                            submitButton.disabled = true;
                        }
                    }).catch((err) => {
                        console.error("❌ OCR Error:", err);
                        loadingIndicator.style.display = "none";
                        errorValidId.textContent = "❌ Error processing ID image.";
                        errorValidId.style.color = "red";
                        submitButton.disabled = true;
                    });
                };
            };
            reader.readAsDataURL(file);
        }
    });
});





