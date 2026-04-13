/**
 * Universal Confirmation Modal
 * @param {string} targetUrl - The URL to go to if confirmed
 * @param {string} message - The custom message to display
 */
function openConfirmModal(targetUrl, message = "Are you sure you want to proceed?") {
    const overlay = document.getElementById('deleteOverlay');
    const confirmBtn = document.getElementById('confirmDeleteLink');
    const textPrompt = document.getElementById('modalText');

    if (overlay && confirmBtn && textPrompt) {
        textPrompt.innerText = message;
        confirmBtn.href = targetUrl;
        overlay.style.display = 'flex';
    }
}

function closeDeleteModal() {
    const overlay = document.getElementById('deleteOverlay');
    if (overlay) {
        overlay.style.display = 'none';
    }
}

// Close modal if user clicks outside the white box
window.onclick = function(event) {
    const overlay = document.getElementById('deleteOverlay');
    if (event.target == overlay) {
        closeDeleteModal();
    }
}