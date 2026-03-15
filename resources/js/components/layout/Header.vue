<template>
  <!-- Top Info Bar -->
<div class="top-info-bar">
    <div class="container">
      <div class="info-items">
        <a href="tel:+254735551515" class="info-item">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
          </svg>
          <span><strong>CALL US: +254 735 551515</strong></span>
        </a>
        <a href="mailto:info@meksis.co.ke" class="info-item">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect width="20" height="16" x="2" y="4"/>
            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
          </svg>
          <span><strong>INFO@MEKSIS.CO.KE</strong></span>
        </a>
        <div class="info-item">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
            <circle cx="12" cy="10" r="3"/>
          </svg>
          <span><strong>INDUSTRIAL AREA, NAIROBI</strong></span>
        </div>
      </div>
    </div>
  </div>

  <header class="site-header" ref="headerRef">
    <div class="container">
      <div class="header-content">
        <!-- Logo -->
        <div class="logo-part">
          <a href="/"><img src="/front_assets/images/logo-dark.png" alt=""></a>
        </div>

        <!-- Desktop Navigation -->
        <nav class="desktop-nav">
          <a href="/" class="nav-link">HOME</a>
          <a href="/about" class="nav-link">ABOUT US</a>

          <!-- Products Dropdown -->
          <div class="products-dropdown">
            <button class="nav-link dropdown-toggle" @click="toggleProductsDropdown">
              PRODUCTS
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" :class="{ rotate: showProductsDropdown }">
                <polyline points="6 9 12 15 18 9"></polyline>
              </svg>
            </button>
            <div class="products-dropdown-menu" :class="{ show: showProductsDropdown }">
              <a
                v-for="service in services"
                :key="service.id"
                :href="`/show/product/${service.slug}`"
                class="service-item"
                @mouseenter="showProductsDropdown = true"
                @click.stop="showProductsDropdown = false"
              >
                <span class="service-name">{{ service.name }}</span>
              </a>
            </div>
          </div>

          <a href="/blogs" class="nav-link">BLOG</a>
        
          <a href="/contact" class="nav-link">CONTACT</a>
        </nav>

        <!-- CTA Buttons -->
        <div class="header-cta">
          <a :href="whatsappLink" target="_blank" rel="noopener noreferrer" class="btn-whatsapp">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
            </svg>
            WHATSAPP
          </a>
          <a href="/contact" class="btn-contact">GET STARTED</a>
        </div>

        <!-- Mobile Menu Toggle -->
        <button class="mobile-menu-toggle" @click="mobileMenuOpen = !mobileMenuOpen" aria-label="Toggle menu">
          <svg v-if="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="4" x2="20" y1="12" y2="12"/>
            <line x1="4" x2="20" y1="6" y2="6"/>
            <line x1="4" x2="20" y1="18" y2="18"/>
          </svg>
          <svg v-else xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"/>
            <path d="m6 6 12 12"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Navigation -->
    <transition name="slide">
      <div v-show="mobileMenuOpen" class="mobile-nav">
        <div class="mobile-nav-content">
          <a href="/" class="mobile-nav-link" @click="mobileMenuOpen = false">HOME</a>
          <a href="/about" class="mobile-nav-link" @click="mobileMenuOpen = false">ABOUT US</a>
          
          <!-- Mobile Products Dropdown -->
          <div class="mobile-dropdown">
            <button 
              class="mobile-dropdown-toggle" 
              @click="mobileProductsOpen = !mobileProductsOpen"
            >
              PRODUCTS
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" :class="{ rotate: mobileProductsOpen }">
                <polyline points="6 9 12 15 18 9"></polyline>
              </svg>
            </button>
            <transition name="expand">
              <div v-show="mobileProductsOpen" class="mobile-dropdown-content">
                <a
                  v-for="service in services"
                  :key="service.id"
                  :href="`/show/product/${service.slug}`"
                  class="mobile-dropdown-link"
                  @click="mobileMenuOpen = false; mobileProductsOpen = false"
                >
                  {{ service.name }}
                </a>
              </div>
            </transition>
          </div>

          <a href="/blog" class="mobile-nav-link" @click="mobileMenuOpen = false">BLOG</a>
          <a href="/contact" class="mobile-nav-link" @click="mobileMenuOpen = false">CONTACT</a>

          <!-- Mobile CTA Buttons -->
          <div class="mobile-cta-buttons">
            <a :href="whatsappLink" target="_blank" rel="noopener noreferrer" class="btn-whatsapp mobile">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
              </svg>
              WHATSAPP US
            </a>
            <a href="/contact" class="btn-contact mobile" @click="mobileMenuOpen = false">GET STARTED</a>
          </div>
        </div>
      </div>
    </transition>
  </header>
</template>

<script>
import axios from 'axios'

export default {
  name: 'SiteHeader',
  data() {
    return {
      whatsappNumber: '254722850008',
      mobileMenuOpen: false,
      showResourcesDropdown: false,
      mobileResourcesOpen: false,
      services: [],
      servicesLoading: true,
      showProductsDropdown: false,
      mobileProductsOpen: false
    }
  },
  computed: {
    whatsappLink() {
      return `https://wa.me/${this.whatsappNumber}?text=Hi%20Meksis%2C%20I'm%20interested%20in%20learning%20more%20about%20your%20services`
    }
  },
  watch: {
    mobileMenuOpen(newVal) {
      if (newVal) {
        document.body.style.overflow = 'hidden'
      } else {
        document.body.style.overflow = ''
        this.mobileResourcesOpen = false
        this.mobileProductsOpen = false
      }
    }
  },
  mounted() {
    this.fetchServices()
    // Close dropdown when clicking outside
    this.boundHandleClickOutside = this.handleClickOutside.bind(this)
    document.addEventListener('click', this.boundHandleClickOutside)
    
    // Add hover listeners for desktop dropdowns
    this.$nextTick(() => {
      if (this.$refs.headerRef) {
        const dropdown = this.$refs.headerRef.querySelector('.dropdown')
        const productsDropdown = this.$refs.headerRef.querySelector('.products-dropdown')
        
        if (dropdown) {
          this.boundShowDropdown = this.showDropdown.bind(this)
          this.boundHideDropdown = this.hideDropdown.bind(this)
          dropdown.addEventListener('mouseenter', this.boundShowDropdown)
          dropdown.addEventListener('mouseleave', this.boundHideDropdown)
        }
        
        if (productsDropdown) {
          this.boundShowProducts = () => { 
            this.showProductsDropdown = true
            // Clear any pending hide timeout
            if (this.productsHideTimeout) {
              clearTimeout(this.productsHideTimeout)
              this.productsHideTimeout = null
            }
          }
          this.boundHideProducts = () => { 
            // Add a small delay before hiding to allow navigation
            this.productsHideTimeout = setTimeout(() => {
              this.showProductsDropdown = false
              this.productsHideTimeout = null
            }, 200)
          }
          productsDropdown.addEventListener('mouseenter', this.boundShowProducts)
          productsDropdown.addEventListener('mouseleave', this.boundHideProducts)
        }
      }
    })
  },
  beforeUnmount() {
    document.body.style.overflow = ''
    document.removeEventListener('click', this.boundHandleClickOutside)
    
    if (this.$refs.headerRef) {
      const dropdown = this.$refs.headerRef.querySelector('.dropdown')
      const productsDropdown = this.$refs.headerRef.querySelector('.products-dropdown')
      
      if (dropdown && this.boundShowDropdown && this.boundHideDropdown) {
        dropdown.removeEventListener('mouseenter', this.boundShowDropdown)
        dropdown.removeEventListener('mouseleave', this.boundHideDropdown)
      }
      
      if (productsDropdown && this.boundShowProducts && this.boundHideProducts) {
        productsDropdown.removeEventListener('mouseenter', this.boundShowProducts)
        productsDropdown.removeEventListener('mouseleave', this.boundHideProducts)
      }
      
      // Clear any pending timeout
      if (this.productsHideTimeout) {
        clearTimeout(this.productsHideTimeout)
        this.productsHideTimeout = null
      }
    }
  },
  methods: {
    async fetchServices() {
      try {
        this.servicesLoading = true
        const response = await axios.get('/api/services')
        this.services = response.data
        // Fix image URLs by removing the incorrect path
        this.services = this.services.map(service => {
          if (service.image) {
            service.image = service.image.replace('/wabe_digital_agency/upload/service_image/', '/upload/service_image/')
          }
          return service
        })
      } catch (error) {
        console.error('Error fetching services:', error)
        // Fallback to hardcoded services if API fails
        this.services = [
          {
            id: 1,
            name: 'CCTV Surveillance',
            slug: 'cctv-surveillance'
          },
          {
            id: 2,
            name: 'Electric Fences',
            slug: 'electric-fences'
          },
          {
            id: 3,
            name: 'Biometric Access Control',
            slug: 'biometric-access-control'
          },
          {
            id: 4,
            name: 'Automated Gates',
            slug: 'automated-gates'
          },
          {
            id: 5,
            name: 'Video Door Phones',
            slug: 'video-door-phones'
          },
          {
            id: 6,
            name: 'Fire Safety Solutions',
            slug: 'fire-safety-solutions'
          },
          {
            id: 7,
            name: 'Barriers & Road Blocks',
            slug: 'barriers-road-blocks'
          },
          {
            id: 8,
            name: 'Metal Detectors',
            slug: 'metal-detectors'
          }
        ]
      } finally {
        this.servicesLoading = false
      }
    },
    handleClickOutside(event) {
      if (!this.$refs.headerRef) return
      
      const dropdown = this.$refs.headerRef.querySelector('.dropdown')
      const productsDropdown = this.$refs.headerRef.querySelector('.products-dropdown')
      const productsDropdownMenu = this.$refs.headerRef.querySelector('.products-dropdown-menu')
      const mobileToggle = this.$refs.headerRef.querySelector('.mobile-menu-toggle')
      
      // Check if click is outside dropdown
      if (dropdown && !dropdown.contains(event.target) && (!mobileToggle || !mobileToggle.contains(event.target))) {
        this.showResourcesDropdown = false
      }
      
      // For products dropdown, check both the dropdown container and the menu itself
      if (productsDropdown) {
        const isClickInside = productsDropdown.contains(event.target) || 
                             (productsDropdownMenu && productsDropdownMenu.contains(event.target))
        const isMobileToggle = mobileToggle && mobileToggle.contains(event.target)
        
        if (!isClickInside && !isMobileToggle) {
          this.showProductsDropdown = false
        }
      }
    },
    showDropdown() {
      this.showResourcesDropdown = true
    },
    hideDropdown() {
      this.showResourcesDropdown = false
    },
    toggleProductsDropdown() {
      this.showProductsDropdown = !this.showProductsDropdown
      // Clear any pending hide timeout when toggling
      if (this.productsHideTimeout) {
        clearTimeout(this.productsHideTimeout)
        this.productsHideTimeout = null
      }
    }
  }
}
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  border-radius: 0 !important;
  box-sizing: border-box;
}

/* Top Info Bar */
.top-info-bar {
  background: var(--charcoal);
  color: var(--white);
  padding: 20px 50px;
  font-size: 14px;
}

.info-items {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 32px;
  flex-wrap: wrap;
}

.info-item {
  display: flex;
  align-items: center;
  gap: 6px;
  color: var(--white);
  text-decoration: none;
  text-transform: uppercase;
  font-weight: bold;
}

.info-item:hover {
  color: var(--royal-yellow);
}

.info-item svg {
  color: var(--royal-yellow);
  flex-shrink: 0;
}

/* Header */
.site-header {
  background: var(--charcoal);
  color: var(--white);
  position: sticky;
  top: 0;
  z-index: 1000;
  font-family: 'Arial Narrow', sans-serif;
  border-bottom: 5px solid var(--royal-yellow);
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 50px;
}

.header-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 16px 0;
  gap: 20px;
}

/* Logo */
.logo-part {
  background: var(--white);
  padding: 8px 12px;
}

.logo-part a {
  display: block;
  line-height: 0;
}

.logo-part img {
  height: 40px;
  width: auto;
  display: block;
}

/* Desktop Navigation */
.desktop-nav {
  display: flex;
  align-items: center;
  gap: 25px;
  flex: 1;
  justify-content: center;
}

.nav-link {
  color: var(--white);
  text-decoration: none;
  font-size: 14px;
  font-weight: bold;
  text-transform: uppercase;
  padding: 8px 4px;
  position: relative;
  background: none;
  border: none;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 4px;
}

.nav-link:hover {
  color: var(--royal-yellow);
}

/* Products Dropdown */
.products-dropdown {
  position: relative;
}

.products-dropdown-menu {
  position: absolute;
  top: 100%;
  left: 50%;
  transform: translateX(-50%);
  margin-top: 0;
  background: var(--charcoal);
  min-width: 700px;
  max-width: 900px;
  padding: 0;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2px;
  border: 2px solid var(--charcoal);
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.1s, visibility 0.1s;
  pointer-events: none;
  z-index: 1000;
}

.products-dropdown-menu.show {
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
}

.service-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 40px 20px;
  color: var(--charcoal);
  text-decoration: none;
  font-size: 1.1rem;
  font-weight: bold;
  text-transform: uppercase;
  text-align: center;
  background: var(--white);
  transition: background 0.1s;
}

.service-item:hover {
  background: var(--royal-yellow);
}

.service-name {
  font-weight: 700;
  line-height: 1.4;
  color: inherit;
}

/* Header CTA */
.header-cta {
  display: flex;
  align-items: center;
  gap: 12px;
}

.btn-whatsapp,
.btn-contact {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 15px 40px;
  text-decoration: none;
  font-weight: 900;
  text-transform: uppercase;
  white-space: nowrap;
  border: 2px solid var(--royal-yellow);
  background: var(--royal-yellow);
  color: var(--charcoal);
}

.btn-whatsapp {
  background: var(--slate-steel);
  color: var(--white);
  border-color: var(--slate-steel);
}

.btn-whatsapp:hover {
  background: var(--white);
  color: var(--slate-steel);
}

.btn-contact:hover {
  background: var(--charcoal);
  color: var(--royal-yellow);
}

/* Mobile Menu Toggle */
.mobile-menu-toggle {
  display: none;
  background: none;
  border: none;
  color: var(--white);
  cursor: pointer;
  padding: 8px;
  margin: -8px;
}

/* Mobile Navigation */
.mobile-nav {
  background: var(--charcoal);
  border-top: 5px solid var(--royal-yellow);
  max-height: calc(100vh - 68px);
  overflow-y: auto;
}

.mobile-nav-content {
  padding: 20px 24px;
}

.mobile-nav-link {
  display: block;
  padding: 14px 16px;
  color: var(--white);
  text-decoration: none;
  font-size: 14px;
  font-weight: bold;
  text-transform: uppercase;
  margin-bottom: 4px;
}

.mobile-nav-link:hover {
  background: var(--royal-yellow);
  color: var(--charcoal);
}

/* Mobile Dropdown */
.mobile-dropdown {
  margin-bottom: 4px;
}

.mobile-dropdown-toggle {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 14px 16px;
  background: none;
  border: none;
  color: var(--white);
  font-size: 14px;
  font-weight: bold;
  text-transform: uppercase;
  cursor: pointer;
  text-align: left;
}

.mobile-dropdown-toggle:hover {
  background: var(--royal-yellow);
  color: var(--charcoal);
}

.mobile-dropdown-toggle svg {
  transition: transform 0.2s;
}

.mobile-dropdown-toggle svg.rotate {
  transform: rotate(180deg);
}

.mobile-dropdown-content {
  padding-left: 16px;
  margin-top: 4px;
}

.mobile-dropdown-link {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 12px 16px;
  color: var(--white);
  text-decoration: none;
  font-size: 14px;
  font-weight: bold;
  text-transform: uppercase;
  margin-bottom: 4px;
}

.mobile-dropdown-link:hover {
  background: var(--royal-yellow);
  color: var(--charcoal);
  padding-left: 24px;
}

/* Mobile CTA Buttons */
.mobile-cta-buttons {
  display: flex;
  flex-direction: column;
  gap: 10px;
  margin-top: 24px;
  padding-top: 20px;
  border-top: 1px solid #444;
}

.btn-whatsapp.mobile,
.btn-contact.mobile {
  width: 100%;
  justify-content: center;
  padding: 15px 20px;
}

/* Animations */
.slide-enter-active,
.slide-leave-active {
  transition: all 0.2s;
}

.slide-enter-from {
  opacity: 0;
  transform: translateY(-10px);
}

.slide-leave-to {
  opacity: 0;
  transform: translateY(-10px);
}

.expand-enter-active,
.expand-leave-active {
  transition: all 0.2s;
  overflow: hidden;
}

.expand-enter-from,
.expand-leave-to {
  max-height: 0;
  opacity: 0;
}

.expand-enter-to,
.expand-leave-from {
  max-height: 200px;
  opacity: 1;
}

/* Responsive */
@media (max-width: 1024px) {
  .container {
    padding: 0 24px;
  }
  
  .products-dropdown-menu {
    min-width: 500px;
    max-width: 600px;
    grid-template-columns: repeat(2, 1fr);
  }
  
  .header-cta {
    gap: 8px;
  }
  
  .btn-whatsapp,
  .btn-contact {
    padding: 12px 20px;
    font-size: 12px;
  }
  
  .info-items {
    gap: 20px;
    font-size: 12px;
  }
}

@media (max-width: 768px) {
  .desktop-nav,
  .header-cta {
    display: none;
  }
  
  .mobile-menu-toggle {
    display: block;
  }
  
  .header-content {
    padding: 14px 0;
  }
  
  .logo-part img {
    height: 40px;
  }
  
  .top-info-bar {
    padding: 12px 24px;
  }
  
  .info-items {
    gap: 16px;
    font-size: 11px;
  }
  
  .info-item span {
    display: none;
  }
  
  .info-item {
    justify-content: center;
  }
}

@media (max-width: 480px) {
  .container {
    padding: 0 16px;
  }
  
  .mobile-nav-content {
    padding: 16px;
  }
  
  .logo-part img {
    height: 36px;
  }
  
  .info-items {
    gap: 12px;
  }

  .mobile-dropdown-link {
    padding: 14px 20px;
    font-size: 12px;
  }
}
</style>