import Highway from '@dogstudio/highway'
import store from '../util/store'

export default class BaseTransition extends Highway.Transition {
  in({ done, from }) {
    this.getElems()
    this.from = from
    this.done = done

    if (store.transitionComplete) this.transitionComplete()
    else window.addEventListener('transitionComplete', this.transitionComplete.bind(this), { once: true })
  }

  scrollToTop() {
    window.scrollTo(0, 0)

    if (store.scrollEngine === 'locomotive-scroll') store.smoothScroll.setScroll(0, 0)
  }

  resetScroll() {
    window.scrollTo(0, 0)

    if (store.scrollEngine === 'locomotive-scroll') {
      store.smoothScroll.setScroll(0, 0)
      store.smoothScroll.update()
      store.smoothScroll.start()
    } else if (store.scrollEngine === 'lenis') {
      store.smoothScroll.start()
      store.smoothScroll.scroll = 0
      store.smoothScroll.targetScroll = 0
    }
  }

  transitionComplete() {
    this.from.remove()

    if (store.scrollEngine === 'locomotive-scroll') store.smoothScroll.setScroll(0, 0)
    else window.scrollTo(0, 0)

    this.hideLoader().then(this.done.bind(this))
  }

  out({ done }) {
    store.smoothScroll && store.smoothScroll.stop()

    this.getElems()

    store.transitionComplete = false

    this.showLoader().then(() => {
      store.transitionComplete = true
      window.dispatchEvent(new CustomEvent('transitionComplete'))
    })

    done()
  }

  hideLoader() {}

  showLoader() {}

  getElems() {}
}
