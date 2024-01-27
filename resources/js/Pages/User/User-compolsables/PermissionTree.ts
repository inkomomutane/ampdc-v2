export default function usePermissionTree(
    modules: Array<App.Data.StructuredCompanyModulePermissionData>,
    selectedPermissions: Array<App.Data.PermissionData> = [],
) {
    let root = {
        Modules: {
            id: "root",
            text: "Modules",
            children: modules.map((module) => module.name),
        },
        ...MoulesNames(modules).reduce((acc, cur) => {
            return {
                ...acc,
                ...cur,
            };
        }),
        ...ModuleLevels(modules).reduce((acc, cur) => {
            return {
                ...acc,
                ...cur,
            };
        }, {}),
        ...Permissions(modules, selectedPermissions).reduce((acc, cur) => {
            return {
                ...acc,
                ...cur,
            };
        }),
    };
    return root;
}

function MoulesNames(
    modules: Array<App.Data.StructuredCompanyModulePermissionData>,
) {
    return modules.map((module) => {
        return {
            [module.name]: {
                id: module.name,
                text: module.name,
                children: [
                    module.name + "-settings",
                    module.name + "-processing",
                    module.name + "-reports",
                ],
            },
        };
    });
}

function ModuleLevels(
    modules: Array<App.Data.StructuredCompanyModulePermissionData>,
) {
    return modules.map((module) => {
        return {
            [module.name + "-settings"]: {
                id: module.name + "-settings",
                text: "Settings",
                children: module.settings.map((setting) => {
                    return setting.id;
                }),
            },
            [module.name + "-processing"]: {
                id: module.name + "-processing",
                text: "Processing",
                children: module.processing.map((processing) => {
                    return processing.id;
                }),
            },
            [module.name + "-reports"]: {
                id: module.name + "-reports",
                text: "Reports",
                children: module.reports.map((report) => {
                    return report.id;
                }),
            },
        };
    });
}

function Permissions(
    modules: Array<App.Data.StructuredCompanyModulePermissionData>,
    selectedPermissions: Array<App.Data.PermissionData> = [],
) {
    return modules.map((module) => {
        let processing = module.processing.map((processing) => {
            return {
                [processing.id + ""]: {
                    id: processing.id,
                    text: processing.name,
                    children: [],
                    state: {
                        checked:
                            selectedPermissions.find(
                                (e) => e.id === processing.id,
                            ) != undefined,
                    },
                },
            };
        });
        let settings = module.settings.map((setting) => {
            return {
                [setting.id + ""]: {
                    id: setting.id,
                    text: setting.name,
                    children: [],
                    state: {
                        checked:
                            selectedPermissions.find(
                                (e) => e.id === setting.id,
                            ) != undefined,
                    },
                },
            };
        });
        let reports = module.reports.map((report) => {
            return {
                [report.id + ""]: {
                    id: report.id,
                    text: report.name,
                    children: [],
                    state: {
                        checked:
                            selectedPermissions.find(
                                (e) => e.id === report.id,
                            ) != undefined,
                    },
                },
            };
        });

        return {
            ...processing.reduce((acc, cur) => {
                return {
                    ...acc,
                    ...cur,
                };
            }, {}),
            ...settings.reduce((acc, cur) => {
                return {
                    ...acc,
                    ...cur,
                };
            }, {}),
            ...reports.reduce((acc, cur) => {
                return {
                    ...acc,
                    ...cur,
                };
            }, {}),
        };
    });
}
