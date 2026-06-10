document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi Canvas
    const canvasEl = document.getElementById('jersey-canvas');
    const canvasContainer = document.getElementById('canvas-container');

    // Set canvas size based on container width to keep it responsive (approx)
    const size = canvasContainer.offsetWidth || 500;
    const canvas = new fabric.Canvas('jersey-canvas', {
        width: size,
        height: size,
        preserveObjectStacking: true, // Keep texts/logos on top
        selection: false // Disable group selection
    });

    // Object References
    let jerseyGroup = null; // The loaded jersey image
    let playerNameText = null;
    let playerNumberText = null;

    // View State (Baca dari URL Parameter jika ada)
    const urlParams = new URLSearchParams(window.location.search);
    let currentSide = urlParams.get('side') || 'front'; // front | back
    let currentDesign = urlParams.get('design') || '1';
    let currentHue = parseFloat(urlParams.get('hue')) || 0;

    // Update URL tanpa refresh
    function updateURL() {
        const url = new URL(window.location);
        url.searchParams.set('design', currentDesign);
        url.searchParams.set('side', currentSide);
        if (currentHue !== 0) {
            url.searchParams.set('hue', currentHue);
        } else {
            url.searchParams.delete('hue');
        }
        window.history.replaceState({}, '', url);
    }

    // Load Jersey Template
    function loadJerseyImage() {
        // Mulai fade-out
        canvasContainer.style.opacity = '0';

        const imagePath = `/images/jersey/jersey-${currentDesign}-${currentSide}.png`;
        console.log("Mencoba memuat gambar:", imagePath, "dengan ukuran canvas:", size);

        // Beri sedikit jeda agar transisi fade-out terlihat sebelum merender ulang canvas yang berat
        setTimeout(() => {
            fabric.Image.fromURL(imagePath, function (img, isError) {
                if (isError || !img) {
                    console.error('Failed to load PNG template dari path:', imagePath);
                    alert("Gagal memuat gambar jersey: " + imagePath);
                    canvasContainer.style.opacity = '1';
                    return;
                }

                console.log("Gambar berhasil dimuat:", img.width, "x", img.height);

                // Remove existing jersey image if any
                if (jerseyGroup) {
                    canvas.remove(jerseyGroup);
                }

                // Scale to fit canvas (gunakan salah satu agar proporsional)
                img.scaleToWidth(size * 0.85);

                // Center it
                img.set({
                    left: size / 2,
                    top: size / 2,
                    originX: 'center',
                    originY: 'center',
                    selectable: false, // Lock it
                    evented: false     // Disable interaction
                });

                // Terapkan HueRotation jika ada
                if (currentHue !== 0) {
                    const hueFilter = new fabric.Image.filters.HueRotation({
                        rotation: currentHue
                    });
                    img.filters.push(hueFilter);
                    img.applyFilters();
                }

                jerseyGroup = img;
                canvas.add(jerseyGroup);
                canvas.sendToBack(jerseyGroup);

                // Ensure texts are on top
                if (playerNameText) canvas.bringToFront(playerNameText);
                if (playerNumberText) canvas.bringToFront(playerNumberText);

                canvas.renderAll();
                console.log("Render canvas selesai.");

                // Fade-in kembali
                canvasContainer.style.opacity = '1';
            });
        }, 150);
    }

    // Initialize Text Objects (Hidden by default)
    function initTexts() {
        const textColor = (currentDesign === '2') ? '#000000' : '#FFFFFF';

        playerNameText = new fabric.Text('NAMA PEMAIN', {
            left: size * 0.52, // Geser sedikit ke kanan (sebelumnya size / 2)
            top: size * 0.20, // Pindah agak ke atas (sebelumnya 0.35)
            fontFamily: 'AdidasWC26',
            fontSize: size * 0.08,
            fill: textColor,
            originX: 'center',
            originY: 'center',
            textAlign: 'center',
            selectable: false,
            evented: false,
            visible: false
        });

        playerNumberText = new fabric.Text('10', {
            left: size * 0.52, // Geser sedikit ke kanan (sebelumnya size / 2)
            top: size * 0.45, // Pindah agak ke atas (sebelumnya 0.55)
            fontFamily: 'AdidasWC26',
            fontSize: size * 0.45,
            fill: textColor,
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

    // Toggle Front/Back View Controls via Buttons
    const btnViewFront = document.getElementById('btn-view-front');
    const btnViewBack = document.getElementById('btn-view-back');
    const backControls = document.getElementById('back-controls');
    const nameInput = document.getElementById('player_name');
    const numberInput = document.getElementById('player_number');

    function updateButtonStyles() {
        if (!btnViewFront || !btnViewBack) return;
        if (currentSide === 'front') {
            btnViewFront.className = "flex-1 py-3 px-4 border-2 font-bold uppercase tracking-widest font-['Rajdhani'] text-sm transition-colors border-[#1A1A1A] bg-[#1A1A1A] text-white";
            btnViewBack.className = "flex-1 py-3 px-4 border-2 font-bold uppercase tracking-widest font-['Rajdhani'] text-sm transition-colors border-[#D0D0CC] bg-[#F2F2F0] text-[#1A1A1A] hover:border-[#1A1A1A]";
        } else {
            btnViewBack.className = "flex-1 py-3 px-4 border-2 font-bold uppercase tracking-widest font-['Rajdhani'] text-sm transition-colors border-[#1A1A1A] bg-[#1A1A1A] text-white";
            btnViewFront.className = "flex-1 py-3 px-4 border-2 font-bold uppercase tracking-widest font-['Rajdhani'] text-sm transition-colors border-[#D0D0CC] bg-[#F2F2F0] text-[#1A1A1A] hover:border-[#1A1A1A]";
        }
    }

    if (btnViewFront && btnViewBack) {
        updateButtonStyles();
        
        btnViewFront.addEventListener('click', () => {
            if (currentSide === 'front') return;
            currentSide = 'front';
            updateURL();
            updateButtonStyles();
            updateView();
            loadJerseyImage();
        });

        btnViewBack.addEventListener('click', () => {
            if (currentSide === 'back') return;
            currentSide = 'back';
            updateURL();
            updateButtonStyles();
            updateView();
            loadJerseyImage();
        });
    }

    function updateView() {

        if (currentSide === 'front') {
            // Disable inputs and add opacity
            if (backControls) backControls.classList.add('opacity-50', 'pointer-events-none');
            if (nameInput) nameInput.disabled = true;
            if (numberInput) numberInput.disabled = true;
            
            // Hide texts on canvas
            if (playerNameText) playerNameText.visible = false;
            if (playerNumberText) playerNumberText.visible = false;
            
        } else {
            // Enable inputs and remove opacity
            if (backControls) backControls.classList.remove('opacity-50', 'pointer-events-none');
            if (nameInput) nameInput.disabled = false;
            if (numberInput) numberInput.disabled = false;
            
            // Show texts on canvas
            if (playerNameText) playerNameText.visible = true;
            if (playerNumberText) playerNumberText.visible = true;
        }
        canvas.renderAll();
    }

    // Design Change Event
    const designRadios = document.querySelectorAll('input[name="jersey_design"]');
    designRadios.forEach(radio => {
        // Set initial checked state based on URL
        if (radio.value === currentDesign) {
            radio.checked = true;
        }

        radio.addEventListener('change', function(e) {
            console.log("Klik desain berubah ke:", e.target.value);
            currentDesign = e.target.value;
            // Saat ganti desain, reset hue slider
            currentHue = 0;
            const hueSlider = document.getElementById('hue_slider');
            if (hueSlider) hueSlider.value = 0;
            
            updateURL();
            
            // Update warna teks berdasarkan desain (desain 2 warnanya hitam)
            const newColor = (currentDesign === '2') ? '#000000' : '#FFFFFF';
            if (playerNameText) playerNameText.set('fill', newColor);
            if (playerNumberText) playerNumberText.set('fill', newColor);
            
            loadJerseyImage();
        });
    });

    // Hue Slider Event
    const hueSlider = document.getElementById('hue_slider');
    if (hueSlider) {
        hueSlider.value = currentHue;
        hueSlider.addEventListener('input', function(e) {
            currentHue = parseFloat(e.target.value);
            updateURL();
            
            if (jerseyGroup) {
                // Hapus filter hue yang lama
                jerseyGroup.filters = jerseyGroup.filters.filter(f => !(f instanceof fabric.Image.filters.HueRotation));
                
                // Tambahkan filter hue yang baru jika bukan 0
                if (currentHue !== 0) {
                    const hueFilter = new fabric.Image.filters.HueRotation({
                        rotation: currentHue
                    });
                    jerseyGroup.filters.push(hueFilter);
                }
                jerseyGroup.applyFilters();
                canvas.renderAll();
            }
        });
    }

    // Text Input Events
    if (nameInput) {
        nameInput.addEventListener('input', function (e) {
            if (playerNameText) {
                playerNameText.set('text', e.target.value.toUpperCase() || 'NAMA PEMAIN');
                canvas.renderAll();
            }
        });
    }

    if (numberInput) {
        numberInput.addEventListener('input', function (e) {
            if (playerNumberText) {
                playerNumberText.set('text', e.target.value || '10');
                canvas.renderAll();
            }
        });
    }

    // Logo Upload Event Removed

    // Helper function to render a side off-screen
    function loadSideDataURL(side) {
        return new Promise((resolve) => {
            const tempCanvas = new fabric.Canvas(null, {
                width: size,
                height: size
            });
            
            const imagePath = `/images/jersey/jersey-${currentDesign}-${side}.png`;
            fabric.Image.fromURL(imagePath, function(img) {
                if (!img) { resolve(null); return; }
                
                img.scaleToWidth(size * 0.85);
                img.set({
                    left: size / 2,
                    top: size / 2,
                    originX: 'center',
                    originY: 'center'
                });
                
                if (currentHue !== 0) {
                    const hueFilter = new fabric.Image.filters.HueRotation({ rotation: currentHue });
                    img.filters.push(hueFilter);
                    img.applyFilters();
                }
                
                tempCanvas.add(img);
                tempCanvas.sendToBack(img);
                
                if (side === 'back') {
                    const nameText = new fabric.Text(playerNameText ? playerNameText.text : 'NAMA PEMAIN', {
                        left: size * 0.52,
                        top: size * 0.20,
                        fontFamily: 'AdidasWC26',
                        fontSize: size * 0.08,
                        fill: (currentDesign === '2') ? '#000000' : '#FFFFFF',
                        originX: 'center',
                        originY: 'center',
                        textAlign: 'center'
                    });
                    
                    const numberText = new fabric.Text(playerNumberText ? playerNumberText.text : '10', {
                        left: size * 0.52,
                        top: size * 0.45,
                        fontFamily: 'AdidasWC26',
                        fontSize: size * 0.45,
                        fill: (currentDesign === '2') ? '#000000' : '#FFFFFF',
                        originX: 'center',
                        originY: 'center',
                        textAlign: 'center'
                    });
                    tempCanvas.add(nameText);
                    tempCanvas.add(numberText);
                }
                
                tempCanvas.renderAll();
                resolve(tempCanvas.toDataURL({ format: 'png', quality: 1 }));
            });
        });
    }

    // Download Button Event
    const btnDownload = document.getElementById('btn-download');
    if (btnDownload) {
        btnDownload.addEventListener('click', function () {
            const originalHTML = btnDownload.innerHTML;
            btnDownload.innerHTML = `<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-[#1A1A1A]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Memproses...`;
            btnDownload.disabled = true;

            Promise.all([loadSideDataURL('front'), loadSideDataURL('back')]).then(([frontData, backData]) => {
                if (!frontData || !backData) {
                    alert("Gagal memproses gambar.");
                    btnDownload.innerHTML = originalHTML;
                    btnDownload.disabled = false;
                    return;
                }

                const finalCanvas = document.createElement('canvas');
                const margin = 40;
                finalCanvas.width = (size * 2) + (margin * 3); // Kiri, Tengah, Kanan
                finalCanvas.height = size + (margin * 2); // Atas, Bawah
                const ctx = finalCanvas.getContext('2d');
                
                // Set background putih
                ctx.fillStyle = '#FFFFFF';
                ctx.fillRect(0, 0, finalCanvas.width, finalCanvas.height);
                
                const imgFront = new Image();
                const imgBack = new Image();
                
                imgFront.onload = () => {
                    ctx.drawImage(imgFront, margin, margin, size, size);
                    imgBack.onload = () => {
                        ctx.drawImage(imgBack, size + (margin * 2), margin, size, size);
                        
                        // Download
                        const finalDataURL = finalCanvas.toDataURL('image/png');
                        const link = document.createElement('a');
                        link.download = `Armor-Jersey-Design-${currentDesign}.png`;
                        link.href = finalDataURL;
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                        
                        // Restore button
                        btnDownload.innerHTML = originalHTML;
                        btnDownload.disabled = false;
                    };
                    imgBack.src = backData;
                };
                imgFront.src = frontData;
            }).catch(err => {
                console.error("Error creating combined image:", err);
                btnDownload.innerHTML = originalHTML;
                btnDownload.disabled = false;
            });
        });
    }

    // Save & WhatsApp Button Event
    const btnSave = document.getElementById('btn-save');
    if (btnSave) {
        btnSave.addEventListener('click', function () {
            const waNumber = "6285718516143";
            let message = `Halo Armor Sportwear, saya ingin memesan jersey dengan desain dari website. (Desain: ${currentDesign}, Sisi: ${currentSide === 'front' ? 'Depan' : 'Belakang'}).`;
            
            if (currentSide === 'back') {
                const name = nameInput ? nameInput.value : '';
                const number = numberInput ? numberInput.value : '';
                message += `\n\nDetail:\nNama Pemain: ${name || '-'}\nNomor Punggung: ${number || '-'}`;
            }

            const waUrl = `https://wa.me/${waNumber}?text=${encodeURIComponent(message)}`;
            window.open(waUrl, '_blank');
        });
    }

    // Muat font custom lalu inisialisasi canvas
    const customFont = new FontFace('AdidasWC26', 'url(/images/fonts/ADIDASWC26-REGULAR.ttf)');
    customFont.load().then(function (font) {
        document.fonts.add(font);
        initTexts();
        updateView();
        loadJerseyImage();
    }).catch(function (err) {
        console.error('Font gagal dimuat:', err);
        // Fallback jika font gagal dimuat
        initTexts();
        updateView();
        loadJerseyImage();
    });
});
