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
    export type VictimData = {
        name: string;
        age: number;
        date_of_birth: string;
        neighborhood: App.Data.NeighborhoodData | any | null;
        violenceType: App.Data.ViolenceTypeData | any | null;
        violence_details: string;
        contact: string;
    };
    export type ViolenceTypeData = {
        id: string | null;
        name: string | null;
        description: string | null;
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
