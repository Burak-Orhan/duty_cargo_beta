document.addEventListener('DOMContentLoaded', function() {
    const timelineItems = document.querySelectorAll('.timeline-dot');
    
    // timeline öğelerini görünür hale getirir
    function animateTimeline() {
        timelineItems.forEach((item, index) => {
            setTimeout(() => {
                item.style.opacity = '1';
                item.style.transform = 'translateX(0)';
            }, index * 300);
        });
    }

    timelineItems.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateX(-20px)';
        item.style.transition = 'all 0.5s ease';
    });

    animateTimeline();

    const statusIcons = document.querySelectorAll('.status-icon');
    statusIcons.forEach(icon => {
        icon.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)';
        });
        
        icon.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // route line animasyonu
    const routeLine = document.querySelector('.route-line');
    if (routeLine) {
        routeLine.style.animation = 'routeProgress 2s infinite';
    }

    // kargo durumlarını tutan objeler
    const CARGO_STATUSES = {
        RECEIVED: 'received',
        ON_WAY: 'on_way',
        IN_DISTRIBUTION: 'in_distribution',
        DELIVERED: 'delivered'
    };

    // timelineı güncelleyen fonksiyon
    function updateTimeline(currentStatus) {
        const timelineContainer = document.querySelector('.space-y-8');
        const timelineDots = document.querySelectorAll('.timeline-dot');
        
        // tüm timeline noktalarını gizle
        timelineDots.forEach(dot => {
            dot.style.display = 'none';
        });

        // mevcut duruma göre timeline noktalarını gösterir
        switch(currentStatus) {
            case CARGO_STATUSES.RECEIVED:
                timelineDots[0].style.display = 'flex';
                break;
            case CARGO_STATUSES.ON_WAY:
                timelineDots[0].style.display = 'flex';
                timelineDots[1].style.display = 'flex';
                break;
            case CARGO_STATUSES.IN_DISTRIBUTION:
                timelineDots[0].style.display = 'flex';
                timelineDots[1].style.display = 'flex';
                timelineDots[2].style.display = 'flex';
                break;
            case CARGO_STATUSES.DELIVERED:
                timelineDots[0].style.display = 'flex';
                timelineDots[1].style.display = 'flex';
                timelineDots[2].style.display = 'flex';
                timelineDots[3].style.display = 'flex';
                break;
        }
    }

    // tahmini teslimat bilgisini güncelleyen fonksiyon
    function updateEstimatedDelivery(currentStatus, estimatedDate) {
        const deliveryContainer = document.querySelector('[style*="linear-gradient"]');
        const statusBadge = deliveryContainer.querySelector('.inline-flex');
        
        if (currentStatus === CARGO_STATUSES.IN_DISTRIBUTION) {
            statusBadge.textContent = 'Bugün Teslim';
            statusBadge.style.backgroundColor = 'rgba(79, 70, 229, 0.15)';
        } else if (currentStatus === CARGO_STATUSES.DELIVERED) {
            statusBadge.textContent = 'Teslim Edildi';
            statusBadge.style.backgroundColor = 'rgba(16, 185, 129, 0.15)';
            statusBadge.style.color = '#059669';
        } else {
            statusBadge.textContent = 'Zamanında';
        }
    }

    // kargo durumunu güncelleyen ana fonksiyon
    function updateCargoStatus(trackingData) {
        const { status, estimatedDeliveryDate } = trackingData;
        
        // timelineı güncelle
        updateTimeline(status);
        
        // tahmini teslimat bilgisi
        updateEstimatedDelivery(status, estimatedDeliveryDate);
    }

    // sayfa yüklendiğinde mevcut durumu kontrol eder
    const currentStatus = document.querySelector('.status-badge').textContent.trim();
    updateStatusBadge(currentStatus);

    const cards = document.querySelectorAll('.card-hover');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '';
        });
    });
}); 