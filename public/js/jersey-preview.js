document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi Canvas
    const canvasEl = document.getElementById('jersey-canvas');
    const canvasContainer = document.getElementById('canvas-container');
    
    // Set canvas size based on container width to keep it responsive (approx)
    const size = Math.min(canvasContainer.offsetWidth, 500);
    const canvas = new fabric.Canvas('jersey-canvas', {
        width: size,
        height: size,
        preserveObjectStacking: true, // Keep texts/logos on top
        selection: false // Disable group selection
    });

    // Object References
    let jerseyGroup = null; // The loaded SVG group
    let basePath = null; // The specific SVG path to color
    let playerNameText = null;
    let playerNumberText = null;
    let logoImage = null;

    // View State
    let currentSide = 'front'; // front | back
    
    // Load Jersey Template
    const templatePath = '/images/jersey/template.svg'; // Using the same template for both sides for simplicity
    
    fabric.loadSVGFromURL(templatePath, function(objects, options) {
        if (!objects || objects.length === 0) {
            console.error('Failed to load SVG template.');
            return;
        }

        // Group the SVG objects
        jerseyGroup = fabric.util.groupSVGElements(objects, options);
        
        // Scale to fit canvas
        jerseyGroup.scaleToWidth(size * 0.8);
        jerseyGroup.scaleToHeight(size * 0.8);
        
        // Center it
        jerseyGroup.set({
            left: size / 2,
            top: size / 2,
            originX: 'center',
            originY: 'center',
            selectable: false, // Lock it
            evented: false     // Disable interaction
        });

        // Find the base path to colorize later (the first path usually)
        if (jerseyGroup.getObjects && jerseyGroup.getObjects().length > 0) {
            basePath = jerseyGroup.getObjects()[0]; // Using getObjects() method instead of _objects
        } else if (jerseyGroup._objects && jerseyGroup._objects.length > 0) {
            basePath = jerseyGroup._objects[0]; 
        } else if (jerseyGroup.paths) {
            basePath = jerseyGroup; // If it's a single path
        }

        canvas.add(jerseyGroup);
        canvas.sendToBack(jerseyGroup);

        initTexts();
        updateView();
        canvas.renderAll();
    });

    // Initialize Text Objects (Hidden by default)
    function initTexts() {
        playerNameText = new fabric.Text('NAMA PEMAIN', {
            left: size / 2,
            top: size * 0.35, // Position near upper back
            fontFamily: 'Arial', // Using standard font for simplicity
            fontSize: size * 0.06,
            fill: '#000000',
            originX: 'center',
            originY: 'center',
            textAlign: 'center',
            selectable: false,
            evented: false,
            visible: false
        });

        playerNumberText = new fabric.Text('10', {
            left: size / 2,
            top: size * 0.55, // Position middle back
            fontFamily: 'Arial', // Can be styled further in future
            fontSize: size * 0.25,
            fontWeight: 'bold',
            fill: '#000000',
            originX: 'center',
            originY: 'center',
            textAlign: 'center',
            selectable: false,
            evented: false,
            visible: false
        });

        canvas.add(playerNameText);
        canvas.add(playerNumberText);
    }

    // Toggle Front/Back View Controls
    const viewRadios = document.querySelectorAll('input[name="view_side"]');
    const frontControls = document.getElementById('front-controls');
    const backControls = document.getElementById('back-controls');

    viewRadios.forEach(radio => {
        radio.addEventListener('change', (e) => {
            currentSide = e.target.value;
            updateView();
        });
    });

    function updateView() {
        if (currentSide === 'front') {
            frontControls.classList.remove('hidden');
            backControls.classList.add('hidden');
            
            // Hide texts, show logo
            if (playerNameText) playerNameText.visible = false;
            if (playerNumberText) playerNumberText.visible = false;
            if (logoImage) logoImage.visible = true;
            
        } else {
            frontControls.classList.add('hidden');
            backControls.classList.remove('hidden');
            
            // Show texts, hide logo
            if (playerNameText) playerNameText.visible = true;
            if (playerNumberText) playerNumberText.visible = true;
            if (logoImage) logoImage.visible = false;
        }
        canvas.renderAll();
    }

    // Color Change Event
    const colorPicker = document.getElementById('jersey-color');
    colorPicker.addEventListener('input', function(e) {
        if (basePath) {
            basePath.set('fill', e.target.value);
            canvas.renderAll();
        }
    });

    // Text Input Events
    const nameInput = document.getElementById('player_name');
    nameInput.addEventListener('input', function(e) {
        if (playerNameText) {
            playerNameText.set('text', e.target.value.toUpperCase() || 'NAMA PEMAIN');
            canvas.renderAll();
        }
    });

    const numberInput = document.getElementById('player_number');
    numberInput.addEventListener('input', function(e) {
        if (playerNumberText) {
            playerNumberText.set('text', e.target.value || '10');
            canvas.renderAll();
        }
    });

    // Logo Upload Event
    const logoUpload = document.getElementById('logo_upload');
    logoUpload.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(f) {
            const data = f.target.result;
            fabric.Image.fromURL(data, function(img) {
                // If there's an existing logo, remove it
                if (logoImage) {
                    canvas.remove(logoImage);
                }

                // Scale image to fit reasonably (e.g., max 20% of canvas width)
                const maxLogoWidth = size * 0.2;
                if (img.width > maxLogoWidth) {
                    img.scaleToWidth(maxLogoWidth);
                }

                logoImage = img;
                logoImage.set({
                    left: size / 2,
                    top: size * 0.45, // Chest area position
                    originX: 'center',
                    originY: 'center',
                    selectable: false, // Locked to prevent complex drag/drop as requested
                    evented: false,
                    visible: currentSide === 'front'
                });

                canvas.add(logoImage);
                canvas.renderAll();
            });
        };
        reader.readAsDataURL(file);
    });

    // Save Button Event
    const btnSave = document.getElementById('btn-save');
    btnSave.addEventListener('click', function() {
        const dataURL = canvas.toDataURL({
            format: 'png',
            quality: 1
        });
        
        // Trigger download
        const link = document.createElement('a');
        link.download = `jersey-preview-${currentSide}.png`;
        link.href = dataURL;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });
});
