var allRoutes = []
import camelCase from 'lodash/camelCase'
const requireModule = require.context('../modules', true, /\.js$/)
const importedRoutes = []

requireModule.keys().forEach(fileName => {
    let str = fileName.split('/')
    str = str[1]
    if (fileName === `./${str}/router/index.js`){
        const moduleName = camelCase(
            fileName.replace(/(\.\/|\.js)/g, '')
        )
        importedRoutes.push(...requireModule(fileName).default)
    }
})

const routes = importedRoutes


export default routes
