declare namespace App.Data {
    export type DistrictData = {
        id: string | null;
        name: string | null;
        province: any | App.Data.ProvinceData | null;
    };
    export type NeighborhoodData = {
        id: string | null;
        name: string | null;
        district: any | App.Data.DistrictData | null;
    };
    export type OrganizationData = {
        id: string | null;
        name: string | null;
        services: string | null;
    };
    export type ProvinceData = {
        id: string | null;
        name: string | null;
    };
    export type RoleData = {
        id: string | null;
        name: string | null;
    };
    export type UserData = {
        id: string | null;
        name: string | null;
        email: string | null;
        contact: string | null;
        active: boolean | null;
        role: App.Data.RoleData | any | null;
        organization: App.Data.OrganizationData | any | null;
    };
    export type VictimCasesHistoryData = {
        id: string | null;
        caseCode: string;
        victim: App.Data.VictimData;
        caseRegisteredBy: App.Data.UserData;
        progressStatus: App.Enums.CaseProgressStatus;
        caseDetails: string | null;
        progressDetails: string | null;
        caseUpdatedBy: App.Data.UserData;
        caseModifiedFields: string | null;
        organization: App.Data.OrganizationData;
        violence_type_id: string;
        forwardedToOrganization: App.Data.OrganizationData | any | null;
        forwardedFromOrganization: App.Data.OrganizationData | any | null;
        isForwarded: boolean;
    };
    export type VictimData = {
        name: string;
        age: number;
        date_of_birth: string | null;
        neighborhood: App.Data.NeighborhoodData | any | null;
        violenceType: App.Data.ViolenceTypeData | any | null;
        violence_details: string | null;
        contact: string | null;
    };
    export type ViolenceTypeData = {
        id: string | null;
        name: string | null;
        description: string | null;
    };
}
declare namespace App.Enums {
    export enum CaseProgressStatus {
        "REPORTED" = "Reportado",
        "FORWARDED" = "Encaminhado",
        "SOLVED" = "Resolvido",
        "CLOSED" = "Encerrado",
        "REOPENED" = "Reaberto",
        "REJECTED" = "Rejeitado",
        "PENDING" = "Pendente",
        "IN_PROGRESS" = "Em andamento",
    }
}
