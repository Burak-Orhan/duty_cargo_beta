document.addEventListener('DOMContentLoaded', function() {
    const profileBtn = document.getElementById('profileDropdownBtn');
    const dropdownMenu = document.querySelector('.dropdown-menu');
    const currentProfile = profileBtn.querySelector('.team-icon');
    const currentName = profileBtn.querySelector('.text-sm');
    const currentRole = profileBtn.querySelector('.text-xs');
    let isDropdownOpen = false;

    function markActiveUser(initials) {
        document.querySelectorAll('.dropdown-item').forEach(item => {
            if(item.dataset.initials === initials) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
    }

    //yüklemede mevcut kullanıcıyı işaretler
    markActiveUser(currentProfile.textContent);

    // dropdownı aç/kapat
    profileBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        isDropdownOpen = !isDropdownOpen;
        dropdownMenu.classList.toggle('hidden');
        
        // butonun svgini döndür
        const svg = profileBtn.querySelector('svg');
        svg.style.transform = isDropdownOpen ? 'rotate(180deg)' : 'rotate(0)';
    });

    // Dropdown itemlara tıklama olayı
    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function() {
            const initials = this.dataset.initials;
            const name = this.dataset.name;
            const role = this.dataset.role;

            // mevcut profili güncelle
            currentProfile.textContent = initials;
            currentName.textContent = name;
            currentRole.textContent = role;

            // aktif kullanıcıyı işaretle
            markActiveUser(initials);

            // dropdownı kapat
            dropdownMenu.classList.add('hidden');
            isDropdownOpen = false;
            profileBtn.querySelector('svg').style.transform = 'rotate(0)';
        });
    });

    // sayfada herhangi bir yerine tıklandığında dropdownı kapat
    document.addEventListener('click', function(e) {
        if (isDropdownOpen && !profileBtn.contains(e.target)) {
            dropdownMenu.classList.add('hidden');
            isDropdownOpen = false;
            profileBtn.querySelector('svg').style.transform = 'rotate(0)';
        }
    });
}); 