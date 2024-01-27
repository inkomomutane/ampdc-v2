// export default function usePermissionTreeBackup(modules: Array<App.Data.StructuredCompanyModulePermissionData>) {
//     let root = {
//         Modules: {
//             id: 'root',
//             text: 'Modules',
//             children: modules.map((module) => module.name),
//         },
//         ...MoulesNames(modules).reduce((acc, cur) => {
//             return {
//                 ...acc,
//                 ...cur
//             }
//         }),
//         ...ModuleLevels(modules).reduce((acc, cur) => {
//             return {
//                 ...acc,
//                 ...cur
//             }
//         }, {}),
//         ...Permissions(modules).reduce((acc, cur) => {
//             return {
//                 ...acc,
//                 ...cur
//             }
//         }),
//     }
//     return root;
// }
//
// function MoulesNames(modules: Array<App.Data.StructuredCompanyModulePermissionData>) {
//     return modules.map((module) => {
//         return {
//             [module.name]: {
//                 id: module.name,
//                 text: module.name,
//                 children: [
//                     module.name + '-settings',
//                     module.name + '-processing',
//                     module.name + '-reports',
//                 ]
//             },
//         }
//     });
// }
//
// function ModuleLevels(modules: Array<App.Data.StructuredCompanyModulePermissionData>) {
//     return modules.map((module) => {
//         return {
//             [module.name + '-settings']: {
//                 id: module.name + '-settings',
//                 text: 'Settings',
//                 children: module.settings.map((setting) => {
//                     return module.name + '-settings-' + setting.name;
//                 }),
//             },
//             [module.name + '-processing']: {
//                 id: module.name + '-processing',
//                 text: 'Processing',
//                 children: module.processing.map((processing) => {
//                     return module.name + '-processing-' + processing.name;
//                 }),
//             },
//             [module.name + '-reports']: {
//                 id: module.name + '-reports',
//                 text: 'Reports',
//                 children: module.reports.map((report) => {
//                     return module.name + '-reports-' + report.name;
//                 }),
//             },
//         }
//     });
//
// }
//
// function Permissions(modules: Array<App.Data.StructuredCompanyModulePermissionData>) {
//     return modules.map((module) => {
//         let processing = module.processing.map((processing) => {
//             return {
//                 [module.name + '-processing-' + processing.name]: {
//                     id: module.name + '-processing-' + processing.name,
//                     text: processing.name,
//                     children: [],
//                 },
//             };
//         });
//         let settings = (module.settings.map((setting) => {
//             return {
//                 [module.name + '-settings-' + setting.name]: {
//                     id: module.name + '-settings-' + setting.name,
//                     text: setting.name,
//                     children: [],
//                 },
//             };
//         }));
//         let reports = (module.reports).map((report) => {
//             return {
//                 [module.name + '-reports-' + report.name]: {
//                     id: module.name + '-reports-' + report.name,
//                     text: report.name,
//                     children: [],
//                 },
//             };
//         });
//
//         return {
//             ...processing.reduce((acc, cur) => {
//                 return {
//                     ...acc,
//                     ...cur
//                 }
//             }, {}),
//             ...settings.reduce((acc, cur) => {
//                 return {
//                     ...acc,
//                     ...cur
//                 }
//             }, {}),
//             ...reports.reduce((acc, cur) => {
//                 return {
//                     ...acc,
//                     ...cur
//                 }
//             }, {}),
//         }
//     });
// }
