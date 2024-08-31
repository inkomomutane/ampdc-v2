import {
    ArticleData, DistrictData, NeighborhoodData, OrganizationData, PerpetratorData, ProvinceData,
    Roles, SupposedReasonOfViolenceData, UserData,
    VictimCaseData,
    ViolenceIncidentLocationData, ViolenceTypeData,
    WebsiteMessageData
} from "@/types/generated";


export interface PaginatedData {
    data: Array;
    links: Array;
    meta: {
        current_page?: number;
        first_page_url?: String;
        from?: Number;
        last_page?: number;
        last_page_url?: String;
        next_page_url?: String;
        path?: String;
        per_page?: Number;
        prev_page_url?: String;
        to?: Number;
        total?: Number;
    };
}

export enum FlahserType {
    success = "success",
    error = "error",
    warning = "warning",
    info = "info",
}

export enum OrderDataBy {
    asc = "asc",
    desc = "desc",
}
export interface Organizations extends Omit<PaginatedData, "data"> {
    data: Array<OrganizationData>;
}

export interface Provinces extends Omit<PaginatedData, "data"> {
    data: Array<ProvinceData>;
}

export interface Districts extends Omit<PaginatedData, "data"> {
    data: Array<DistrictData>;
}

export interface Neighborhoods extends Omit<PaginatedData, "data"> {
    data: Array<NeighborhoodData>;
}

export interface Users extends Omit<PaginatedData, "data"> {
    data: Array<UserData>;
}

export interface ViolenceTypes extends Omit<PaginatedData, "data"> {
    data: Array<ViolenceTypeData>;
}
export interface Perpetrators extends Omit<PaginatedData, "data"> {
    data: Array<PerpetratorData>;
}

export interface SupposedReasonOfViolences extends Omit<PaginatedData, "data"> {
    data: Array<SupposedReasonOfViolenceData>;
}
export interface ViolenceIncidentLocations extends Omit<PaginatedData, "data"> {
    data: Array<ViolenceIncidentLocationData>;
}

export interface VictimCasesHistories extends Omit<PaginatedData, "data"> {
    data: Array<VictimCaseData>;
}

export interface Articles extends Omit<PaginatedData, "data"> {
    data: Array<ArticleData>;
}

export interface WebsiteMessages extends Omit<PaginatedData, "data"> {
    data: Array<WebsiteMessageData>;
}

export interface User {
    id: number;
    name: string;
    email: string;
    contact: string;
    active: boolean;
    email_verified_at: string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
    role : Roles
};
