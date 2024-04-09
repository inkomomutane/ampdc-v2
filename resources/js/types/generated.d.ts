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
    };
}
declare namespace App.Enums {
    export type CaseProgressStatus =
        | "Reportado"
        | "Encaminhado"
        | "Resolvido"
        | "Encerrado"
        | "Reaberto"
        | "Rejeitado"
        | "Pendente"
        | "Em andamento";
}
