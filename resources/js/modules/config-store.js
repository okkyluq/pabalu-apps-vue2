import camelCase from 'lodash/camelCase'
const requireModule = require.context('../modules', true, /\.js$/)
let store = {}

requireModule.keys().forEach(fileName => {
    let str = fileName.split('/')

    if(fileName.includes('/store/')){
        let namaModuleCamelCase = str[1].charAt(0).toUpperCase() + str[1].slice(1);
        let namaFile = str[3].replace(/(\.\/|\.js)/g, '');
        let namaFileCamelCase = namaFile.charAt(0).toUpperCase() + namaFile.slice(1);

        let moduleName = namaModuleCamelCase + 'Store' + namaFileCamelCase
        store[moduleName] = {
            namespaced: true,
            ...requireModule(fileName).default
        }
    }

})


export default store
