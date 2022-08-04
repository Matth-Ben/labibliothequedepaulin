import gsap from 'gsap'

export default class Menu {
  constructor() {
    this.menuOpen = false
    this.isAnimating = false

    this.bindMethods()
    this.getElems()
    this.init()
    this.addEvents()

    setTimeout(() => {
      this.onPageChange({ href: window.location.href })
    }, 200)
  }

  bindMethods() {
    this.toggle = this.toggle.bind(this)
  }

  getElems() {
    this.$header = document.querySelector('.header')
    this.$menu = document.querySelector('.header__nav-menu')
    this.$menuItems = this.$menu.querySelectorAll('.header__nav-menu__item-link')
    this.$toggler = document.querySelector('.header__toggler')
  }

  addEvents() {
    this.$toggler && this.$toggler.addEventListener('click', this.toggle)
  }

  init() {
    const tl = gsap.timeline({
      onStart: () => {
        this.menuOpen = true
      }
    })

    if (window.innerWidth < 1200) {
      tl.to(this.$menu, {
        xPercent: 100,
        opacity: 0
      })
      tl.to(this.$menuItems, {
        yPercent: 100,
        opacity: 0
      })
    }
  }

  onPageChange(location) {
    this.$menuItems.forEach((item) => {
      item.classList.contains('actif') && item.classList.remove('actif')
      if (item.href === location.href) {
        item.classList.add('actif')
      }
    })
    if (window.innerWidth < 1200) {
      this.close()
    }
  }

  toggle() {
    if (this.isAnimating) return

    if (this.menuOpen) this.close()
    else this.open()
  }

  open() {
    return new Promise((resolve) => {
      this.$toggler.classList.add('open')
      this.menuOpen = true

      const tl = gsap.timeline({
        onStart: () => {
          this.menuOpen = true
        }
      })

      tl.fromTo(this.$menu, {
        xPercent: 100,
        opacity: 0
      }, {
        xPercent: 0,
        duration: 0.6,
        opacity: 1,
        ease: 'power1.out'
      }, 'start')

      tl.fromTo(this.$menuItems, {
        yPercent: 100,
        opacity: 0
      }, {
        yPercent: 0,
        duration: 0.6,
        opacity: 1,
        stagger: 0.125,
        ease: 'power1.out'
      })

      resolve()
    })
  }

  close() {
    return new Promise((resolve) => {
      this.$toggler.classList.remove('open')
      this.menuOpen = false

      const tl = gsap.timeline({
        onStart: () => {
          this.menuOpen = false
        }
      })

      tl.fromTo(this.$menu, {
        xPercent: 0,
        opacity: 1
      }, {
        xPercent: 100,
        duration: 0.6,
        opacity: 0,
        ease: 'power1.out'
      }, 'start')

      tl.fromTo(this.$menuItems, {
        yPercent: 0,
        opacity: 1
      }, {
        yPercent: 100,
        duration: 0.6,
        opacity: 0,
        stagger: 0.125,
        ease: 'power1.out'
      })
      resolve()
    })
  }

  resize() {
    this.init()
  }

  scroll() {
    if (this.$header.querySelector('.active') !== null) {
      this.$header.querySelector('.active').hover = false
    }
  }
}
