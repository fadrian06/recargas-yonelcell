import './styles/index.css'

const baseUri = document
  .querySelector('base')
  ?.getAttribute('href')
  ?.substring(0, -1)

alert(`Edit ${baseUri}/resources/src/index.ts`)
