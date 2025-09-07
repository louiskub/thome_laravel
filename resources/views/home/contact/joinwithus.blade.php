@extends('layouts.layout_home')
@section('content')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <link rel="stylesheet" href="/css/home/contact/joinwithus.css">
    <!-- Join Us Section -->
    <div class="join-us-container">
        <div class="join-us-content">
            <h1>{{ __('joinus.hero_title') }}</h1>
            <p>{{ __('joinus.hero_subtitle') }}</p>
            <a href="mailto:ananthaxb@gmail.com" class="btn">{{ __('joinus.hero_button') }}</a>
        </div>
        <div class="join-us-image">
            <img src="/img/joinwithus2.png" alt="Join Us Illustration">
        </div>
    </div>

    <!-- Job Listings Section -->
    <div class="apply-job">
        <h1>{{ __('joinus.hiring_title') }}</h1>
        <p>{{ __('joinus.hiring_subtitle') }}</p>
        <div class="job-container">
            @foreach ($jobs as $job)
                @if (in_array($job->employment_type, ['Full-time', 'Part-time', 'Contract']))
                    <div class="job-listing">
                        <h2>{{ $job->translation->position }}</h2>
                        <p><strong>Employment Type:</strong> {{ $job->employment_type }}</p>
                        <p><strong>Location:</strong> {{ $job->location }}</p>
                        <p><strong>Requirements:</strong>{{ $job->translation->requirements }} </p>
                        <button class="apply-btn" onclick="openJobModal('{{ $job->translation->position }}')">Apply
                            Now</button>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- Benefits Section -->
    <div class="benefits-section">
        <div class="benefits-header">
            {{ __('joinus.benefits_title') }}
        </div>
        <div class="benefits-container">
            <div class="benefit-item">
                <div class="benefit-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 7C2 5.89543 2.89543 5 4 5H20C21.1046 5 22 5.89543 22 7V17C22 18.1046 21.1046 19 20 19H4C2.89543 19 2 18.1046 2 17V7Z"
                            stroke="currentColor" stroke-width="2" />
                        <path d="M2 7L22 7" stroke="currentColor" stroke-width="2" />
                        <path d="M7 15H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <path d="M7 11H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <path d="M18 11H18.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <path d="M18 15H18.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
                <div class="benefit-text">
                    <ul>
                        @foreach (__('joinus.benefit_1') as $item)
                            <div>{{ $item }}</div>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="benefit-item">
                <div class="benefit-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6H20L18.42 16.22C18.2 17.2 17.26 18 16.28 18H7.72C6.74 18 5.8 17.2 5.58 16.22L4 6Z"
                            stroke="currentColor" stroke-width="2" />
                        <path d="M4 6L2 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <path d="M20 6L22 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <path d="M12 2V6" stroke="currentColor" stroke-width="2" />
                        <path d="M8 10L16 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <path d="M10 14L14 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
                <div class="benefit-text">
                    <ul>
                        @foreach (__('joinus.benefit_2') as $item)
                            <div>{{ $item }}</div>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="benefit-item">
                <div class="benefit-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2" />
                        <path d="M3 21V19C3 16.7909 4.79086 15 7 15H11C13.2091 15 15 16.7909 15 19V21" stroke="currentColor"
                            stroke-width="2" />
                        <circle cx="17" cy="7" r="3" stroke="currentColor" stroke-width="2" />
                        <path d="M21 21V19C21 17.3431 19.6569 16 18 16H17" stroke="currentColor" stroke-width="2" />
                    </svg>
                </div>
                <div class="benefit-text">
                    <ul>
                        @foreach (__('joinus.benefit_3') as $item)
                            <div>{{ $item }}</div>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="benefit-item">
                <div class="benefit-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <polygon
                            points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26"
                            stroke="currentColor" stroke-width="2" />
                        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2" />
                        <path d="M12 1V5" stroke="currentColor" stroke-width="2" />
                        <path d="M12 19V23" stroke="currentColor" stroke-width="2" />
                        <path d="M4.22 4.22L7.05 7.05" stroke="currentColor" stroke-width="2" />
                        <path d="M16.95 16.95L19.78 19.78" stroke="currentColor" stroke-width="2" />
                    </svg>
                </div>
                <div class="benefit-text">
                    <ul>
                        @foreach (__('joinus.benefit_4') as $item)
                            <div>{{ $item }}</div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Application Process Steps Section -->
    <div class="application-process">
        <div class="process-header">
            <div class="process-title">{{ __('joinus.steps_title') }}</div>
        </div>

        <div class="steps-container">
            <div class="step-item">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h3 class="step-title">{{ __('joinus.step_1_title') }}</h3>
                    <div class="step-date">{{ __('joinus.step_1_date') }}</div>
                    <p class="step-description">
                        {{ __('joinus.step_1_description') }}
                    </p>
                    <div class="step-highlight">
                        {{ __('joinus.step_1_highlight') }}
                    </div>
                </div>
            </div>

            <div class="step-item">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h3 class="step-title">{{ __('joinus.step_2_title') }}</h3>
                    <div class="step-date">{{ __('joinus.step_2_date') }}</div>
                    <p class="step-description">
                        {{ __('joinus.step_2_description') }}
                    </p>
                    <div class="step-highlight">
                        {{ __('joinus.step_2_highlight') }}
                    </div>
                </div>
            </div>

            <div class="step-item">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h3 class="step-title">{{ __('joinus.step_3_title') }}</h3>
                    <div class="step-date">{{ __('joinus.step_3_date') }}</div>
                    <p class="step-description">
                        {{ __('joinus.step_3_description') }}
                    </p>
                    <div class="step-highlight">
                        {{ __('joinus.step_3_highlight') }}
                    </div>
                </div>
            </div>

            <div class="step-item">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h3 class="step-title">{{ __('joinus.step_4_title') }}</h3>
                    <div class="step-date">{{ __('joinus.step_4_date') }}</div>
                    <p class="step-description">
                        {{ __('joinus.step_4_description') }}
                    </p>
                    <div class="step-highlight">
                        {{ __('joinus.step_4_highlight') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Listings Section -->
    <div class="apply-job">
        <h1>{{ __('joinus.hiring_title') }}</h1>
        <p>{{ __('joinus.hiring_internship_subtitle') }}</p>
        <div class="job-container">
            @foreach ($jobs as $job)
                @if (!in_array($job->employment_type, ['Full-time', 'Part-time', 'Contract']))
                    <div class="job-listing">
                        <h2>{{ $job->translation->position }}</h2>
                        <p><strong>Employment Type:</strong> {{ $job->employment_type }}</p>
                        <p><strong>Location:</strong> {{ $job->location }}</p>
                        <p><strong>Requirements:</strong>{{ $job->translation->requirements }} </p>
                        <button class="apply-btn" onclick="openJobModal('{{ $job->translation->position }}')">Apply
                            Now</button>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- image slide Section -->
    <div class="apply-job d-flex justify-content-center flex-row"></div>
        <h1>บรรยากาศในที่ทำงาน</h1>
        <div class="image-slide m-5" style="padding:30px 40px;">
            <div class="slider mb-4">
                <img src="/img/joinus/0.jpg" alt="">
                <img src="/img/joinus/1.jpg" alt="">
                <img src="/img/joinus/2.jpg" alt="">
                <img src="/img/joinus/3.jpg" alt="">
                <img src="/img/joinus/4.jpg" alt="">
                <img src="/img/joinus/5.jpg" alt="">
                <img src="/img/joinus/6.jpg" alt="">
            </div>
            <div class="d-flex justify-content-between mb-4" style="">
                <div class="d-flex gap-2 dot-container">
                    <button>
                        <svg height="100" width="100" xmlns="http://www.w3.org/2000/svg">
                            <circle r="45" cx="50" cy="50" fill="#2dbffd" />
                        </svg>
                    </button>
                    <button>
                        <svg height="100" width="100" xmlns="http://www.w3.org/2000/svg">
                            <circle r="45" cx="50" cy="50" fill="#ccc" />
                        </svg>
                    </button>
                    <button>
                        <svg height="100" width="100" xmlns="http://www.w3.org/2000/svg">
                            <circle r="45" cx="50" cy="50" fill="#ccc" />
                        </svg>
                    </button>
                    <button>
                        <svg height="100" width="100" xmlns="http://www.w3.org/2000/svg">
                            <circle r="45" cx="50" cy="50" fill="#ccc" />
                        </svg>
                    </button>
                </div>
                <div class="d-flex gap-3">
                    <button class="chev chev-left">
                        <span class="material-symbols-outlined">
                            chevron_left
                        </span>
                    </button>
                    <button class="chev chev-right blue">
                        <span class="material-symbols-outlined">
                            chevron_right
                        </span>
                    </button>
                </div>
            </div>
        </div>


        <div>
            <video width="300px"  controls>
                <source src="/img/joinus/vid.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>

    <div class="overlay" id="overlay">
        <span class="close" id="closeBtn">&times;</span>
        <img id="overlayImg" src="" alt="Big View">
    </div>

    <script>
        const imageSlide = document.querySelector('.image-slide');
        const slider = imageSlide.querySelector('.slider');
        const left = imageSlide.querySelector('.chev-left');
        const right = imageSlide.querySelector('.chev-right');
        const dotContainer = imageSlide.querySelectorAll('.dot-container button');

        let count = 0;

        function updateColor() {
            if (count == 0) {
                left.classList.remove('blue');
            } else {
                left.classList.add('blue');
            }
            if (count == 3) {
                right.classList.remove('blue');
            } else {
                right.classList.add('blue');
            }

            dotContainer.forEach((btn, idx) => {
                if (idx === count) {
                    btn.querySelector('circle').style.fill = '#2dbffd';
                } else {
                    btn.querySelector('circle').style.fill = "#cccccc";
                }
            })
        }

        left.addEventListener('click', () => {

            slider.scrollLeft -= 500;
            if (count > 0) {
                count--;
                updateColor();
            }
            console.log(`left count=${count}`);
        });

        right.addEventListener('click', () => {
            slider.scrollLeft += 500;
            if (count < 3) {
                count++;
                updateColor();
            }
            console.log(`right count=${count}`);
        });

        const images = document.querySelectorAll(".slider img");
        const overlay = document.getElementById("overlay");
        const overlayImg = document.getElementById("overlayImg");
        const closeBtn = document.getElementById("closeBtn");

        images.forEach(img => {
            img.addEventListener("click", () => {
                overlay.style.display = "flex";
                overlayImg.src = img.src;
                document.body.style.overflow = "hidden";
            });
        });

        closeBtn.addEventListener("click", () => {
            overlay.style.display = "none";
            document.body.style.overflow = "auto";
        });

        overlay.addEventListener("click", (e) => {
            if (e.target === overlay) {
                overlay.style.display = "none";
                document.body.style.overflow = "auto";
            }
        });
    </script>

    <!-- Job Application Modal -->
    <div id="jobModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeJobModal()">&times;</span>
            <h2 id="modalTitle">{{ __('joinus.apply_for_position') }}</h2>
            <form id="jobApplicationForm">
                <div class="form-group">
                    <label for="fullName">{{ __('joinus.full_name_label') }} *</label>
                    <input type="text" id="fullName" name="fullName" required>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('joinus.email_label') }} *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">{{ __('joinus.phone_label') }} *</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="position">{{ __('joinus.position_label') }} *</label>
                    <input type="text" id="position" name="position" readonly>
                </div>
                <div class="form-group">
                    <label for="experience">{{ __('joinus.experience_label') }}</label>
                    <select id="experience" name="experience">
                        <option value="">{{ __('joinus.select_experience') }}</option>
                        <option value="0-1">{{ __('joinus.experience_0_1') }}</option>
                        <option value="1-3">{{ __('joinus.experience_1_3') }}</option>
                        <option value="3-5">{{ __('joinus.experience_3_5') }}</option>
                        <option value="5-10">{{ __('joinus.experience_5_10') }}</option>
                        <option value="10+">{{ __('joinus.experience_10_plus') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="education">{{ __('joinus.education_label') }}</label>
                    <select id="education" name="education">
                        <option value="">{{ __('joinus.select_education') }}</option>
                        <option value="high-school">{{ __('joinus.education_high_school') }}</option>
                        <option value="diploma">{{ __('joinus.education_diploma') }}</option>
                        <option value="bachelor">{{ __('joinus.education_bachelor') }}</option>
                        <option value="master">{{ __('joinus.education_master') }}</option>
                        <option value="phd">{{ __('joinus.education_phd') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="coverLetter">{{ __('joinus.cover_letter_label') }}</label>
                    <textarea id="coverLetter" name="coverLetter" rows="5"
                        placeholder="{{ __('joinus.cover_letter_placeholder') }}"></textarea>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-cancel"
                        onclick="closeJobModal()">{{ __('joinus.cancel_button') }}</button>
                    <button type="submit" class="btn-submit" id="submitBtn">
                        <span class="loading-spinner" id="loadingSpinner"></span>
                        <span id="submitText">{{ __('joinus.submit_button') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Success Message -->
    <div id="successMessage" class="success-message">
        <div class="success-content">
            <h3>{{ __('joinus.success_title') }}</h3>
            <p>{{ __('joinus.success_message') }}</p>
            <button onclick="closeSuccessMessage()" class="btn">{{ __('joinus.close_button') }}</button>
        </div>
    </div>

    <!-- Error Message -->
    <div id="errorMessage" class="error-message">
        <div class="error-content">
            <h3>{{ __('joinus.error_title') }}</h3>
            <p id="errorText">{{ __('joinus.error_message') }}</p>
            <button onclick="closeErrorMessage()" class="btn">{{ __('joinus.close_button') }}</button>
        </div>
    </div>

    <script>
        // Initialize EmailJS
        (function() {
            emailjs.init('rJoednBWRySd43PyI');
        })();

        // Get current locale for JavaScript
        const currentLocale = '{{ app()->getLocale() }}';

        // Localized text for JavaScript
        const localizedText = {
            modalTitleAdmin: '{{ __('joinus.modal_title_admin') }}',
            modalTitleCivilEngineer: '{{ __('joinus.modal_title_civil_engineer') }}',
            submitting: '{{ __('joinus.submitting') }}',
            submitButton: '{{ __('joinus.submit_button') }}',
            errorRequiredFields: '{{ __('joinus.error_required_fields') }}',
            errorInvalidEmail: '{{ __('joinus.error_invalid_email') }}',
            errorEmailSending: '{{ __('joinus.error_email_sending') }}',
            emailSubject: '{{ __('joinus.email_subject') }}',
            applicantDetails: '{{ __('joinus.applicant_details') }}',
            coverLetterSection: '{{ __('joinus.cover_letter_section') }}',
            noCoverLetter: '{{ __('joinus.no_cover_letter') }}',
            notSpecified: '{{ __('joinus.not_specified') }}',
            contactApplicant: '{{ __('joinus.contact_applicant') }}',
            forFurtherCommunication: '{{ __('joinus.for_further_communication') }}',
            // เพิ่มตัวแปรที่ขาดหายไป
            fullNameLabel: '{{ __('joinus.full_name_label') }}',
            emailLabel: '{{ __('joinus.email_label') }}',
            phoneLabel: '{{ __('joinus.phone_label') }}',
            positionLabel: '{{ __('joinus.position_label') }}',
            experienceLabel: '{{ __('joinus.experience_label') }}',
            educationLabel: '{{ __('joinus.education_label') }}'
        };

        // Job positions data
        const jobPositions = {};
        // const jj = document.querySelectorAll('.job-listing');
        const jj = @json($jobs);
        jj.forEach(job => {
            // let localPosition = job.querySelector('h2').textContent.trim();
            let localPosition = job.translation.position;
            jobPositions[localPosition] = {
                title: localPosition,
                position: localPosition,
            }
        })

        // Open job application modal
        function openJobModal(jobType) {
            const modal = document.getElementById("jobModal")
            const modalTitle = document.getElementById("modalTitle")
            const positionInput = document.getElementById("position")
            const jobData = jobPositions[jobType]

            modalTitle.textContent = jobData.title
            positionInput.value = jobData.position
            modal.style.display = "block"
            document.body.style.overflow = "hidden"
        }

        // Close job application modal
        function closeJobModal() {
            const modal = document.getElementById("jobModal")
            modal.style.display = "none"
            document.body.style.overflow = "auto"
            // Reset form
            document.getElementById("jobApplicationForm").reset()
            resetSubmitButton()
        }

        // Close success message
        function closeSuccessMessage() {
            const successMessage = document.getElementById("successMessage")
            successMessage.style.display = "none"
            document.body.style.overflow = "auto"
        }

        // Close error message
        function closeErrorMessage() {
            const errorMessage = document.getElementById("errorMessage")
            errorMessage.style.display = "none"
            document.body.style.overflow = "auto"
        }

        // Show loading state
        function showLoading() {
            const submitBtn = document.getElementById("submitBtn")
            const loadingSpinner = document.getElementById("loadingSpinner")
            const submitText = document.getElementById("submitText")

            submitBtn.disabled = true
            loadingSpinner.style.display = "inline-block"
            submitText.textContent = localizedText.submitting
        }

        // Reset submit button
        function resetSubmitButton() {
            const submitBtn = document.getElementById("submitBtn")
            const loadingSpinner = document.getElementById("loadingSpinner")
            const submitText = document.getElementById("submitText")

            submitBtn.disabled = false
            loadingSpinner.style.display = "none"
            submitText.textContent = localizedText.submitButton
        }

        // Show error message
        function showError(message) {
            const errorMessage = document.getElementById("errorMessage")
            const errorText = document.getElementById("errorText")
            errorText.textContent = message
            errorMessage.style.display = "block"
        }

        // Handle form submission
        document.getElementById("jobApplicationForm").addEventListener("submit", function(e) {
            e.preventDefault()

            // Get form data
            const formData = new FormData(this)
            const data = {}
            for (const [key, value] of formData.entries()) {
                data[key] = value
            }

            // Validate required fields
            const requiredFields = ["fullName", "email", "phone", "position"]
            let isValid = true
            requiredFields.forEach((field) => {
                const input = document.getElementById(field)
                if (!data[field] || data[field].trim() === "") {
                    input.style.borderColor = "#dc3545"
                    isValid = false
                } else {
                    input.style.borderColor = "#e9ecef"
                }
            })

            if (!isValid) {
                showError(localizedText.errorRequiredFields)
                return
            }

            // Validate email format
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
            if (!emailRegex.test(data.email)) {
                document.getElementById("email").style.borderColor = "#dc3545"
                showError(localizedText.errorInvalidEmail)
                return
            }

            // Show loading state
            showLoading()

            // Prepare email template parameters
            const templateParams = {
                to_email: 'ananthaxb@gmail.com',
                from_name: data.fullName,
                from_email: data.email,
                phone: data.phone,
                position: data.position,
                experience: data.experience || localizedText.notSpecified,
                education: data.education || localizedText.notSpecified,
                cover_letter: data.coverLetter || localizedText.noCoverLetter,
                subject: `${localizedText.emailSubject} ${data.position} - ${data.fullName}`,
                message: `${localizedText.applicantDetails}:
- ${localizedText.fullNameLabel}: ${data.fullName}
- ${localizedText.emailLabel}: ${data.email}
- ${localizedText.phoneLabel}: ${data.phone}
- ${localizedText.positionLabel}: ${data.position}
- ${localizedText.experienceLabel}: ${data.experience || localizedText.notSpecified}
- ${localizedText.educationLabel}: ${data.education || localizedText.notSpecified}

${localizedText.coverLetterSection}:
${data.coverLetter || localizedText.noCoverLetter}

${localizedText.contactApplicant} ${data.email} or ${data.phone} ${localizedText.forFurtherCommunication}`.trim()
            }

            // Send email using EmailJS
            emailjs.send('Thome', 'template_shjqlbp', templateParams)
                .then(function(response) {
                    console.log('SUCCESS!', response.status, response.text);
                    resetSubmitButton()
                    closeJobModal()
                    document.getElementById("successMessage").style.display = "block"
                }, function(error) {
                    console.log('FAILED...', error);
                    resetSubmitButton()
                    showError(
                        `${localizedText.errorEmailSending} ${error.text || error.message || 'Unknown error'}`
                    )
                });
        })

        // Close modal when clicking outside
        window.addEventListener("click", (event) => {
            const modal = document.getElementById("jobModal")
            const successMessage = document.getElementById("successMessage")
            const errorMessage = document.getElementById("errorMessage")

            if (event.target === modal) {
                closeJobModal()
            }
            if (event.target === successMessage) {
                closeSuccessMessage()
            }
            if (event.target === errorMessage) {
                closeErrorMessage()
            }
        })

        // Handle escape key
        document.addEventListener("keydown", (event) => {
            if (event.key === "Escape") {
                const modal = document.getElementById("jobModal")
                const successMessage = document.getElementById("successMessage")
                const errorMessage = document.getElementById("errorMessage")

                if (modal.style.display === "block") {
                    closeJobModal()
                }
                if (successMessage.style.display === "block") {
                    closeSuccessMessage()
                }
                if (errorMessage.style.display === "block") {
                    closeErrorMessage()
                }
            }
        });

        // Form validation on input
        document.addEventListener("DOMContentLoaded", () => {
            const inputs = document.querySelectorAll("input[required], select[required]")
            inputs.forEach((input) => {
                input.addEventListener("blur", function() {
                    if (this.value.trim() === "") {
                        this.style.borderColor = "#dc3545"
                    } else {
                        this.style.borderColor = "#e9ecef"
                    }
                })

                input.addEventListener("input", function() {
                    if (this.value.trim() !== "") {
                        this.style.borderColor = "#e9ecef"
                    }
                })
            })

            // Add scroll animation for steps
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }, index * 200);
                    }
                });
            }, observerOptions);

            // Observe step items
            document.querySelectorAll('.step-item').forEach((step, index) => {
                step.style.opacity = '0';
                step.style.transform = 'translateY(30px)';
                step.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(step);
            });
        })
    </script>
@endsection
