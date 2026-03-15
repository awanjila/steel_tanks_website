<template>
  <div class="about-page">
    <!-- Hero Section -->
    <section class="hero-section">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1 class="hero-title">About Meksis Engineering</h1>
        <p class="hero-subtitle">Securing Your World Since 2010</p>
      </div>
      <div class="hero-slider">
        <transition name="fade" mode="out-in">
          <div :key="activeSlide" class="slide">
            <div class="slide-content">
              <h3>{{ heroSlides[activeSlide].title }}</h3>
              <p>{{ heroSlides[activeSlide].description }}</p>
            </div>
          </div>
        </transition>
        <div class="slider-dots">
          <button
            v-for="(slide, index) in heroSlides"
            :key="index"
            @click="activeSlide = index"
            :class="['dot', { active: activeSlide === index }]"
            :aria-label="`Go to slide ${index + 1}`"
          ></button>
        </div>
      </div>
    </section>

    <!-- Company Overview -->
    <section class="section-container">
      <div class="content-wrapper">
        <div class="section-header">
          <div class="icon-wrapper">
            <i class="fas fa-building"></i>
          </div>
          <h2>Company Overview</h2>
        </div>
        <div class="content-card">
          <p class="lead-text">
            Meksis Engineering was established in 2010. Our primary aim is providing the best security solutions for our clients by taking advantage of today's modern technology. We form partnerships with our clients to ensure they realize the most gain in terms of advice and economy.
          </p>
        </div>
      </div>
    </section>

    <!-- Mission & Vision -->
    <section class="section-container bg-light">
      <div class="content-wrapper">
        <div class="mission-vision-grid">
          <!-- Mission Statement -->
          <div class="mv-card">
            <div class="mv-header">
              <div class="icon-wrapper">
                <i class="fas fa-bullseye"></i>
              </div>
              <h2>Mission Statement</h2>
            </div>
            <ul class="statement-list">
              <li>
                <i class="fas fa-check-circle"></i>
                <div>
                  <strong>To our customers</strong> - we aim to deliver a service in which they can be confident in all aspects: price, delivery and support.
                </div>
              </li>
              <li>
                <i class="fas fa-check-circle"></i>
                <div>
                  <strong>To our staff</strong> - we aim to deliver a stimulating and rewarding working environment.
                </div>
              </li>
            </ul>
          </div>

          <!-- Vision Statement -->
          <div class="mv-card">
            <div class="mv-header">
              <div class="icon-wrapper">
                <i class="fas fa-eye"></i>
              </div>
              <h2>Vision Statement</h2>
            </div>
            <p class="vision-text">
              Our vision is to be a market leader in the security industry through our dedication to providing quality services and the best solutions in the market.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Solutions Section -->
    <section class="section-container">
      <div class="content-wrapper">
        <div class="section-header centered">
          <h2>Our Products</h2>
          <p class="section-subtitle">Comprehensive security systems tailored to your needs</p>
        </div>

        <div class="solutions-grid">
          <!-- Residential Solutions -->
          <div class="solution-card">
            <div class="solution-header">
              <div class="solution-icon residential">
                <i class="fas fa-home"></i>
              </div>
              <h3>Residential Solutions</h3>
            </div>
            <ul class="solution-list">
              <li v-for="item in residentialSolutions" :key="item">
                <i class="fas fa-shield-alt"></i>
                <span>{{ item }}</span>
              </li>
            </ul>
          </div>

          <!-- Commercial Solutions -->
          <div class="solution-card">
            <div class="solution-header">
              <div class="solution-icon commercial">
                <i class="fas fa-briefcase"></i>
              </div>
              <h3>Commercial Solutions</h3>
            </div>
            <ul class="solution-list">
              <li v-for="item in commercialSolutions" :key="item">
                <i class="fas fa-shield-alt"></i>
                <span>{{ item }}</span>
              </li>
            </ul>
          </div>

          <!-- Outdoor Solutions -->
          <div class="solution-card">
            <div class="solution-header">
              <div class="solution-icon outdoor">
                <i class="fas fa-tree"></i>
              </div>
              <h3>Outdoor Solutions</h3>
            </div>
            <ul class="solution-list">
              <li v-for="item in outdoorSolutions" :key="item">
                <i class="fas fa-shield-alt"></i>
                <span>{{ item }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const activeSlide = ref(0)
let sliderInterval = null

const heroSlides = [
  {
    title: 'Professional CCTV Surveillance Systems',
    description: 'High-definition cameras with remote monitoring, night vision, and cloud storage for complete property oversight.',
    image: '/images/hero/cctv-surveillance.jpg'
  },
  {
    title: 'Electric Fence & Perimeter Security',
    description: 'Advanced energizer systems with alarm integration, ensuring maximum protection for residential and commercial properties.',
    image: '/images/hero/electric-fence.jpg'
  },
  {
    title: 'Access Control & Biometric Solutions',
    description: 'Fingerprint scanners, card readers, and automated gate systems for secure and convenient entry management.',
    image: '/images/hero/residential-security.jpg'
  },
  {
    title: 'Automated Gates & Barrier Systems',
    description: 'Automated gates and barriers for secure property access.',
    image: '/images/hero/automated-gates.jpg'
  }
]

const residentialSolutions = [
  'CCTV Cameras',
  'Automated Gates',
  'Electric Fences',
  'Fire Extinguishers',
  'Video Door Phones',
  'Fire Doors'
]

const commercialSolutions = [
  'Biometric Access Control',
  'Surveillance Cameras',
  'Metal Detectors',
  'Fire Extinguishers'
]

const outdoorSolutions = [
  'Electric Fences',
  'Barriers and Road Blocks',
  'Automatic Gates'
]

onMounted(() => {
  sliderInterval = setInterval(() => {
    activeSlide.value = (activeSlide.value + 1) % heroSlides.length
  }, 5000)
})

onUnmounted(() => {
  if (sliderInterval) {
    clearInterval(sliderInterval)
  }
})
</script>

<style scoped>
/* ===== GLOBAL STYLES ===== */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.about-page {
  font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
  color: #1e293b;
  line-height: 1.6;
}

/* ===== HERO SECTION ===== */
.hero-section {
  position: relative;
  background: linear-gradient(135deg, #02375f 0%, #01aeef 100%);
  min-height: 500px;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  padding: 80px 24px 120px;
}

.hero-overlay {
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at 30% 50%, rgba(1, 174, 239, 0.3) 0%, transparent 50%),
              radial-gradient(circle at 70% 50%, rgba(2, 55, 95, 0.3) 0%, transparent 50%);
}

.hero-content {
  position: relative;
  z-index: 2;
  text-align: center;
  max-width: 800px;
  margin-bottom: 60px;
}

.hero-title {
  font-size: 3.5rem;
  font-weight: 800;
  color: white;
  margin-bottom: 16px;
  text-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
}

.hero-subtitle {
  font-size: 1.5rem;
  color: rgba(255, 255, 255, 0.95);
  font-weight: 300;
}

.hero-slider {
  position: absolute;
  bottom: 40px;
  left: 50%;
  transform: translateX(-50%);
  width: 90%;
  max-width: 700px;
  z-index: 2;
}

.slide {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
  border-radius: 16px;
  padding: 32px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
}

.slide-content h3 {
  font-size: 1.5rem;
  color: #02375f;
  margin-bottom: 12px;
  font-weight: 700;
}

.slide-content p {
  color: #475569;
  font-size: 1rem;
  line-height: 1.7;
}

.slider-dots {
  display: flex;
  justify-content: center;
  gap: 12px;
  margin-top: 20px;
}

.dot {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.4);
  border: 2px solid white;
  cursor: pointer;
  transition: all 0.3s ease;
}

.dot:hover {
  background: rgba(255, 255, 255, 0.6);
}

.dot.active {
  background: white;
  width: 32px;
  border-radius: 6px;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

/* ===== SECTIONS ===== */
.section-container {
  padding: 80px 24px;
}

.section-container.bg-light {
  background: linear-gradient(to bottom, #f8fafc 0%, #f1f5f9 100%);
}

.content-wrapper {
  max-width: 1200px;
  margin: 0 auto;
}

.section-header {
  margin-bottom: 48px;
}

.section-header.centered {
  text-align: center;
}

.section-header h2 {
  font-size: 2.5rem;
  font-weight: 800;
  color: #02375f;
  margin-bottom: 12px;
}

.section-subtitle {
  font-size: 1.125rem;
  color: #64748b;
  max-width: 600px;
  margin: 0 auto;
}

.icon-wrapper {
  width: 60px;
  height: 60px;
  background: linear-gradient(135deg, #01aeef 0%, #02375f 100%);
  border-radius: 12px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 16px;
}

.icon-wrapper i {
  font-size: 1.75rem;
  color: white;
}

/* ===== CONTENT CARD ===== */
.content-card {
  background: white;
  border-radius: 16px;
  padding: 40px;
  box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
  border: 1px solid rgba(1, 174, 239, 0.1);
}

.lead-text {
  font-size: 1.125rem;
  line-height: 1.8;
  color: #475569;
}

/* ===== MISSION & VISION ===== */
.mission-vision-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
  gap: 32px;
}

.mv-card {
  background: white;
  border-radius: 16px;
  padding: 40px;
  box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
  border: 1px solid rgba(1, 174, 239, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.mv-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 32px rgba(1, 174, 239, 0.15);
}

.mv-header {
  margin-bottom: 24px;
}

.mv-header h2 {
  font-size: 1.75rem;
  color: #02375f;
  font-weight: 700;
}

.statement-list {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.statement-list li {
  display: flex;
  gap: 16px;
  align-items: flex-start;
}

.statement-list li i {
  color: #01aeef;
  font-size: 1.25rem;
  flex-shrink: 0;
  margin-top: 2px;
}

.statement-list li div {
  font-size: 1rem;
  color: #475569;
  line-height: 1.7;
}

.vision-text {
  font-size: 1.125rem;
  line-height: 1.8;
  color: #475569;
}

/* ===== SOLUTIONS GRID ===== */
.solutions-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  gap: 32px;
  margin-top: 48px;
}

.solution-card {
  background: white;
  border-radius: 16px;
  padding: 32px;
  box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
  border: 1px solid rgba(1, 174, 239, 0.1);
  transition: all 0.3s ease;
}

.solution-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 40px rgba(1, 174, 239, 0.2);
}

.solution-header {
  margin-bottom: 24px;
}

.solution-icon {
  width: 70px;
  height: 70px;
  border-radius: 14px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 16px;
}

.solution-icon.residential {
  background: linear-gradient(135deg, #01aeef 0%, #0284c7 100%);
}

.solution-icon.commercial {
  background: linear-gradient(135deg, #02375f 0%, #01aeef 100%);
}

.solution-icon.outdoor {
  background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
}

.solution-icon i {
  font-size: 2rem;
  color: white;
}

.solution-header h3 {
  font-size: 1.5rem;
  font-weight: 700;
  color: #02375f;
}

.solution-list {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 14px;
}

.solution-list li {
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 1rem;
  color: #475569;
  padding: 8px 0;
  border-bottom: 1px solid #f1f5f9;
}

.solution-list li:last-child {
  border-bottom: none;
}

.solution-list li i {
  color: #01aeef;
  font-size: 0.875rem;
  flex-shrink: 0;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 1024px) {
  .hero-title {
    font-size: 2.75rem;
  }

  .mission-vision-grid {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 768px) {
  .hero-section {
    padding: 60px 16px 100px;
    min-height: 450px;
  }

  .hero-title {
    font-size: 2.25rem;
  }

  .hero-subtitle {
    font-size: 1.125rem;
  }

  .slide {
    padding: 24px;
  }

  .slide-content h3 {
    font-size: 1.25rem;
  }

  .section-container {
    padding: 60px 16px;
  }

  .section-header h2 {
    font-size: 2rem;
  }

  .content-card,
  .mv-card {
    padding: 28px;
  }

  .solutions-grid {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 480px) {
  .hero-title {
    font-size: 1.875rem;
  }

  .hero-subtitle {
    font-size: 1rem;
  }

  .section-header h2 {
    font-size: 1.75rem;
  }

  .content-card,
  .mv-card,
  .solution-card {
    padding: 24px;
  }

  .icon-wrapper {
    width: 50px;
    height: 50px;
  }

  .icon-wrapper i {
    font-size: 1.5rem;
  }
}
</style>