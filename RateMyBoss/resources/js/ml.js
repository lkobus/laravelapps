import Vue from 'vue'
import { MLInstaller, MLCreate, MLanguage } from 'vue-multilanguage'

Vue.use(MLInstaller)

export default new MLCreate({
  initial: 'pt-br',
  save: process.env.NODE_ENV === 'production',
  languages: [
    new MLanguage('english').create({
      title: 'Hello {0}!',
      msg: 'You have {f} friends and {l} likes'
    }),

    new MLanguage('pt-br').create({
      title: 'Oi {0}!',
      msg: 'Você tem {f} amigos e {l} curtidas'
    })
  ]
})