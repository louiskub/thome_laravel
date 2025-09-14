<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Sarabun', sans-serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Header Styles */
    .main-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .title-underline {
        width: 100px;
        height: 4px;
        background: linear-gradient(45deg, #3498db, #2980b9);
        margin: 0 auto;
        border-radius: 2px;
    }

    /* Service Selection */
    .service-selection {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-bottom: 40px;
        flex-wrap: wrap;
    }

    .service-btn {
        padding: 15px 30px;
        border: none;
        border-radius: 25px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .service-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .service-btn.active {
        transform: scale(1.05);
    }

    /* Service Content */
    .service-content {
        display: none;
    }

    .service-content.active {
        display: block;
    }

    /* Filter Styles */
    .filter-container {
        background: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .filter-header {
        text-align: center;
        margin-bottom: 15px;
    }

    .filter-header i {
        font-size: 1.5rem;
        color: #7f8c8d;
    }

    .filter-tabs {
        display: flex;
        justify-content: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .filter-btn {
        padding: 10px 20px;
        border: 2px solid transparent;
        border-radius: 20px;
        background: #ecf0f1;
        color: #2c3e50;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-btn:hover {
        transform: translateY(-1px);
    }

    /* Department Section */
    .department-section {
        margin-bottom: 40px;
    }

    .department-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 25px;
    }

    .department-title {
        font-size: 1.8rem;
        font-weight: 600;
        color: #2c3e50;
    }

    .department-line {
        flex: 1;
        height: 3px;
        border-radius: 2px;
    }

    .department-count {
        background: #ecf0f1;
        color: #2c3e50;
        padding: 5px 15px;
        border-radius: 15px;
        font-weight: 600;
    }

    /* Updated team grid to use CSS Grid with different layouts for management and team */
    .team-grid {
        display: grid;
        gap: 25px;
        margin-bottom: 30px;
    }

    /* Management section - 3 columns with larger cards */
    .department-section[data-category*="ผู้บริหาร"] .team-grid,
    .department-section[data-category*="บริหาร"] .team-grid {
        grid-template-columns: repeat(3, 1fr);
    }

    .department-section[data-category*="ผู้บริหาร"] .team-card,
    .department-section[data-category*="บริหาร"] .team-card {
        max-width: none;
    }

    .department-section[data-category*="ผู้บริหาร"] .card-image,
    .department-section[data-category*="บริหาร"] .card-image {
        height: 300px;
    }

    /* Team section - 4 columns with standard cards */
    .department-section[data-category*="ทีมงาน"] .team-grid,
    .department-section:not([data-category*="ผู้บริหาร"]):not([data-category*="บริหาร"]) .team-grid {
        grid-template-columns: repeat(4, 1fr);
    }

    .team-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        cursor: pointer;
        width: 100%;
    }

    .team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .card-image {
        position: relative;
        height: 250px;
        overflow: hidden;
    }

    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .team-card:hover .card-image img {
        transform: scale(1.05);
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
        z-index: 1;
    }

    /* Moved card content outside image to prevent overlapping */
    .card-image-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 2;
        color: white;
        padding: 20px;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, transparent 100%);
    }

    .department-badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
        margin-bottom: 8px;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
    }

    .card-image-content h3 {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .card-image-content p {
        font-size: 0.9rem;
        opacity: 0.9;
    }

    /* Added card info section below image */
    .card-content {
        padding: 20px;
    }

    .contact-info {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
        color: #7f8c8d;
    }

    .contact-info i {
        width: 16px;
    }

    .skills {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .skill-badge {
        background: #ecf0f1;
        color: #2c3e50;
        padding: 5px 12px;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    /* Added modal styles for profile cards */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        backdrop-filter: blur(5px);
    }

    .modal-overlay.active {
        display: flex;
    }

    .modal-content {
        background: white;
        border-radius: 20px;
        max-width: 600px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        position: relative;
        animation: modalSlideIn 0.3s ease;
    }

    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: scale(0.8) translateY(-50px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    .modal-close {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(0, 0, 0, 0.1);
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        cursor: pointer;
        font-size: 1.2rem;
        color: #666;
        transition: all 0.3s ease;
        z-index: 10;
    }

    .modal-close:hover {
        background: rgba(0, 0, 0, 0.2);
        transform: scale(1.1);
    }

    .modal-profile {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
    }

    .modal-image {
        position: relative;
        height: 400px;
        overflow: hidden;
        border-radius: 20px 0 0 20px;
    }

    .modal-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .modal-info {
        padding: 30px;
        border-radius: 0 20px 20px 0;
    }

    .modal-name {
        font-size: 2rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .modal-position {
        font-size: 1.2rem;
        color: #7f8c8d;
        margin-bottom: 20px;
    }

    .modal-department {
        display: inline-block;
        background: linear-gradient(45deg, #3498db, #2980b9);
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 25px;
    }

    .modal-contact {
        margin-bottom: 25px;
    }

    .modal-contact-item {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
        color: #2c3e50;
    }

    .modal-contact-item i {
        width: 20px;
        color: #3498db;
    }

    .modal-skills {
        margin-bottom: 25px;
    }

    .modal-skills h4 {
        color: #2c3e50;
        margin-bottom: 15px;
        font-size: 1.1rem;
    }

    .modal-skills-list {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .modal-skill-badge {
        background: #ecf0f1;
        color: #2c3e50;
        padding: 8px 16px;
        border-radius: 15px;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .modal-bio {
        color: #7f8c8d;
        line-height: 1.6;
        font-size: 1rem;
    }

    @media (max-width: 1024px) {
        /* Management - 2 columns on tablet */
        .department-section[data-category*="ผู้บริหาร"] .team-grid,
        .department-section[data-category*="บริหาร"] .team-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        /* Team - 3 columns on tablet */
        .department-section[data-category*="ทีมงาน"] .team-grid,
        .department-section:not([data-category*="ผู้บริหาร"]):not([data-category*="บริหาร"]) .team-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .title {
            font-size: 2rem;
        }

        .service-selection {
            flex-direction: column;
            align-items: center;
        }

        .service-btn {
            width: 100%;
            max-width: 300px;
        }

        .filter-tabs {
            flex-direction: column;
            align-items: center;
        }

        .filter-btn {
            width: 100%;
            max-width: 200px;
        }

        /* Mobile - 2 columns for all sections */
        .team-grid {
            grid-template-columns: repeat(2, 1fr) !important;
        }

        .modal-profile {
            grid-template-columns: 1fr;
        }

        .department-header {
            flex-direction: column;
            text-align: center;
            gap: 10px;
        }

        .department-line {
            width: 100px;
            margin: 0 auto;
        }

        .modal-name {
            font-size: 1.6rem;
        }

        .modal-image {
            height: 300px;
            border-radius: 20px 20px 0 0;
        }

        .modal-info {
            border-radius: 0 0 20px 20px;
        }
    }

    @media (max-width: 480px) {
        /* Very small screens - 1 column */
        .team-grid {
            grid-template-columns: 1fr !important;
        }
    }

    /* Hidden class for filtering */
    .hidden {
        display: none !important;
    }
</style>

<div id="profileModal" class="modal-overlay">
    <div class="modal-content">
        <button class="modal-close" onclick="closeProfileModal()">&times;</button>
        <div class="modal-profile">
            <div class="modal-image">
                <img id="modalImage" src="/placeholder.svg" alt="">
            </div>
            <div class="modal-info">
                <h2 id="modalName" class="modal-name"></h2>
                <p id="modalPosition" class="modal-position"></p>
                <span id="modalDepartment" class="modal-department"></span>
                
                <div class="modal-contact">
                    <div id="modalPhone" class="modal-contact-item">
                        <i class="fas fa-phone"></i>
                        <span></span>
                    </div>
                    <div id="modalEmail" class="modal-contact-item">
                        <i class="fas fa-envelope"></i>
                        <span></span>
                    </div>
                    <div id="modalLine" class="modal-contact-item">
                        <i class="fab fa-line"></i>
                        <span></span>
                    </div>
                </div>

                <div class="modal-skills">
                    <h4>ความเชี่ยวชาญ</h4>
                    <div id="modalSkills" class="modal-skills-list"></div>
                </div>

                <div class="modal-bio">
                    <p id="modalBio"></p>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($members as $member)
    <!-- Added onclick event to team cards -->
    <div class="team-card" data-category="{{ $member->department }}" onclick="openProfileModal({{ json_encode($member) }})">
        <div class="card-image">
            <img src="{{ $member->image_url ?? '/images/default-avatar.jpg' }}" alt="{{ $member->name }}">
            <div class="image-overlay"></div>
            <div class="card-image-content">
                <span class="department-badge">{{ $member->department }}</span>
                <h3>{{ $member->name }}</h3>
                <p>{{ $member->position }}</p>
            </div>
        </div>
        <div class="card-content">
            @if($member->phone)
                <div class="contact-info">
                    <i class="fas fa-phone"></i>
                    <span>{{ $member->phone }}</span>
                </div>
            @endif
            @if($member->email)
                <div class="contact-info">
                    <i class="fas fa-envelope"></i>
                    <span>{{ $member->email }}</span>
                </div>
            @endif
            @if($member->skills)
                <div class="skills">
                    @foreach(explode(',', $member->skills) as $skill)
                        <span class="skill-badge">{{ trim($skill) }}</span>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endforeach

<script>
    function openProfileModal(member) {
        const modal = document.getElementById('profileModal');
        
        // Populate modal with member data
        document.getElementById('modalImage').src = member.image_url || '/images/default-avatar.jpg';
        document.getElementById('modalName').textContent = member.name;
        document.getElementById('modalPosition').textContent = member.position;
        document.getElementById('modalDepartment').textContent = member.department;
        
        // Contact information
        const phoneElement = document.getElementById('modalPhone');
        const emailElement = document.getElementById('modalEmail');
        const lineElement = document.getElementById('modalLine');
        
        if (member.phone) {
            phoneElement.querySelector('span').textContent = member.phone;
            phoneElement.style.display = 'flex';
        } else {
            phoneElement.style.display = 'none';
        }
        
        if (member.email) {
            emailElement.querySelector('span').textContent = member.email;
            emailElement.style.display = 'flex';
        } else {
            emailElement.style.display = 'none';
        }
        
        if (member.line_id) {
            lineElement.querySelector('span').textContent = member.line_id;
            lineElement.style.display = 'flex';
        } else {
            lineElement.style.display = 'none';
        }
        
        // Skills
        const skillsContainer = document.getElementById('modalSkills');
        skillsContainer.innerHTML = '';
        if (member.skills) {
            const skills = member.skills.split(',');
            skills.forEach(skill => {
                const skillBadge = document.createElement('span');
                skillBadge.className = 'modal-skill-badge';
                skillBadge.textContent = skill.trim();
                skillsContainer.appendChild(skillBadge);
            });
        }
        
        // Bio
        document.getElementById('modalBio').textContent = member.bio || 'ไม่มีข้อมูลเพิ่มเติม';
        
        // Show modal
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeProfileModal() {
        const modal = document.getElementById('profileModal');
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    document.getElementById('profileModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeProfileModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeProfileModal();
        }
    });
</script>
