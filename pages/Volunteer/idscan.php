<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Scanner</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tesseract.js/4.0.2/tesseract.min.js"></script>
</head>
<body>

    <h2>Upload Your ID</h2>

    <!-- Dropdown for selecting ID type -->
    <label for="id-type">Select ID Type:</label>
    <select id="id-type">
        <option value="national">National ID</option>
        <option value="passport">Passport</option>
        <option value="driver">Driver’s License</option>
    </select>

    <input type="file" id="id-upload" accept="image/*">
    <p id="loading" style="color: blue; display: none;">Scanning ID... ⏳</p>

    <h3>Extracted Data</h3>
    <label>ID Number:</label>
    <input type="text" id="id-number" placeholder="Scanned ID appears here">
    <p id="error-message" style="color: red;"></p>

    <script>
        // JSON-like object for ID patterns (matching words or numeric ID)
        const idPatterns = {
    "national": {
        numberPattern: /\d{4}-\d{4}-\d{4}-\d{4}/,  // Example: 1234-5678-9012-3456 (numeric pattern)
        wordPattern: /\bPAMBANSANG\sPAGKAKAKILANLAN\b/i  // Example: PAMBANSANG PAGKAKAKILANLAN (word pattern)
    },
    "ePhilID": {
        numberPattern: /\d{4}-\d{4}-\d{4}-\d{4}/,  // Example: 5678-9012-3456-7890 (numeric pattern)
        wordPattern: /\bPAMBANSANG\sPAGKAKAKILANLAN\b/i  // Example: PAMBANSANG PAGKAKAKILANLAN (word pattern)
    },
    "SSS ID": {
        numberPattern: /\d{2}-\d{7}-\d{1}/,  // Example: 34-5678901-2 (numeric pattern)
        wordPattern: /\bSSS\sID\b/i  // Example: SSS ID (word pattern)
    },
    "PRC ID": {
        numberPattern: /\d{2}-\d{6}/,  // Example: 12-345678 (numeric pattern)
        wordPattern: /\bPRC\sID\b/i  // Example: PRC ID (word pattern)
    },
    "Postal ID": {
        numberPattern: /\d{4} \d{4} \d{4}/,  // Example: 1234 5678 9012 (numeric pattern)
        wordPattern: /\bPOSTAL\sID\b/i  // Example: POSTAL ID (word pattern)
    },
    "passport": {
        numberPattern: /\b[A-Z]\d{7}\b/,  // Example: A1234567 (numeric pattern)
        wordPattern: /\bPASAPORTE\b/i  // Example: PASAPORTE (word pattern)
    },
    "driver": {
        numberPattern: /\b[A-Z]{2}-\d{6}\b/,  // Example: AB-123456 (numeric pattern)
        wordPattern: /\bLAND\sTRANSPORTATION\sOFFICE\b/i  // Example: LAND TRANSPORTATION OFFICE (word pattern)
    },
    "UMID": {
        numberPattern: /\d{4}-\d{7}-\d{1}/,  // Example: 1234-5678901-2 (numeric pattern)
        wordPattern: /\bUMID\b/i  // Example: UMID (word pattern)
    },
    "NBI Clearance": {
        numberPattern: /^[A-Z0-9]{18}$/,  // Example: ABC123456789012345 (numeric pattern)
        wordPattern: /\bNBI\sCLEARANCE\b/i  // Example: NBI CLEARANCE (word pattern)
    },
    "ACR i-Card": {
        numberPattern: /^[A-Z]{3}\d{9}$/,  // Example: ACR123456789 (numeric pattern)
        wordPattern: /\bACR\sI-CARD\b/i  // Example: ACR I-CARD (word pattern)
    },
    "Government Office and GOCC ID": {
        numberPattern: /^[A-Z0-9-]+$/,  // Example: GOCC-123456 (numeric pattern)
        wordPattern: /\bGOVERNMENT\sOFFICE\sAND\sGOCC\sID\b/i  // Example: GOVERNMENT OFFICE AND GOCC ID (word pattern)
    },
    "IBP Card": {
        numberPattern: /\d{1,4}-\d{4}/,  // Example: 123-4567 (numeric pattern)
        wordPattern: /\bIBP\sCARD\b/i  // Example: IBP CARD (word pattern)
    }
};


        document.getElementById("id-upload").addEventListener("change", function (event) {
            let file = event.target.files[0];

            if (!file) {
                console.warn("⚠️ No file selected.");
                return;
            }

            let reader = new FileReader();
            reader.onload = function () {
                processImage(reader.result);
            };
            reader.readAsDataURL(file);
        });

        function processImage(imageData) {
            document.getElementById("loading").style.display = "block";

            Tesseract.recognize(
                imageData,
                'eng',
                {
                    logger: (m) => console.log("📊 OCR Progress:", m),
                    tessedit_char_whitelist: "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 ",  // Allow letters and numbers
                    tessedit_pageseg_mode: 6
                }
            ).then(({ data: { text } }) => {
                document.getElementById("loading").style.display = "none";
                console.log("📜 Extracted Text: ", text);  // Log the extracted text

                // Get selected ID type
                let selectedIdType = document.getElementById("id-type").value;
                let patterns = idPatterns[selectedIdType];

                // Check for numeric ID and word pattern in the extracted text
                let numberId = text.match(patterns.numberPattern)?.[0] || "Not Found";
                let wordId = text.match(patterns.wordPattern)?.[0] || "Not Found";

                // Display the numeric ID if found
                let scannedId = numberId !== "Not Found" ? numberId : wordId;

                // Display the scanned ID in the text box
                document.getElementById("id-number").value = scannedId;

                // Display error or success message
                if (scannedId === "Not Found") {
                    document.getElementById("error-message").textContent = "❌ ID not recognized!";
                } else {
                    document.getElementById("error-message").textContent = "✅ ID detected!";
                }
            }).catch(err => {
                console.error("❌ OCR Error:", err);
                document.getElementById("error-message").textContent = "❌ Error processing ID.";
                document.getElementById("loading").style.display = "none";
            });
        }
    </script>

</body>
</html>
