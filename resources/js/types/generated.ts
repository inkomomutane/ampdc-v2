export type ArticleData = {
    id: string | null;
    title: string | null;
    slug: string | null;
    content: string | null;
    cover: MediaData | null;
    sections: Array<any>;
    status: string;
    location: string | null;
    short_description: string;
};
export type ArticleSectionData = {
    id: string | null;
    title: string | null;
    content: string | null;
    cover: MediaData | null;
};
export type BaseDataClass = {
    id: string | null;
    name: string | null;
};
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
export enum CivilState {
    "SINGLE" = "solteiro",
    "MARRIED" = "casado",
    "DIVORCED" = "divorciado",
    "WIDOWER" = "viúvo",
    "NOT_SPECIFIED" = "não especificado",
}
export type DistrictData = {
    id: string | null;
    name: string | null;
    province: any | ProvinceData | null;
};
export enum DocumentTypeMoz {
    "BI" = "BI",
    "NUIT" = "NUIT",
    "PASSPORT" = "Passaporte",
    "BIRTH_CERTIFICATE" = "Certidão de Nascimento",
    "DRIVING_LICENSE" = "Carta de Condução",
    "DIRE" = "DIRE",
    "OTHER" = "Outro",
}
export enum EducationLevel {
    "PRIMARY" = "Ensino Primário",
    "SECONDARY" = "Ensino Secundário",
    "TECHNICAL_PROFESSIONAL" = "Ensino Técnico Profissional",
    "UNIVERSITY" = "Ensino Universitário",
    "POSTGRADUATE" = "Pós-Graduação",
    "MASTER" = "Mestrado",
    "DOCTORATE" = "Doutoramento",
    "NONE" = "Nenhuma",
    "NOT_SPECIFIED" = "Não Especificado",
}
export enum Gender {
    "FEMALE" = "Feminino",
    "MALE" = "Masculino",
    "LGBTQ_OTHER" = "LGBTQ+/Outro",
}
export type MediaData = {
    id: number | null;
    file_name: string | null;
    name: string | null;
    mime_type: string | null;
    original_url: string | null;
    preview_url: string | null;
    size: number | null;
    custom_properties: Array<any> | null;
    responsive_images: ResponsiveImageData | Array<any> | null;
    srcset: string | null;
};
export type MediaLibraryOriginalData = {
    base64svg: string | null;
    urls: Array<any> | null;
};
export type NeighborhoodData = {
    id: string | null;
    name: string | null;
    district: any | DistrictData | null;
};
export type OrganizationData = {
    id: string | null;
    name: string | null;
    services: string | null;
};
export enum PeriodOfViolenceAct {
    "MORNING" = "Manhã",
    "AFTERNOON" = "Tarde",
    "NIGHT" = "Noite",
    "DAWN" = "Madrugada",
    "OUTRO" = "Outro",
}
export type PerpetratorData = {
    id: string | null;
    name: string | null;
};
export type ProvinceData = {
    id: string | null;
    name: string | null;
};
export type ResponsiveImageData = {
    media_library_original: MediaLibraryOriginalData | null;
};
export type RoleData = {
    id: string | null;
    name: string | null;
};
export enum Roles {
    "SUPER_ADMIN" = "Super admin",
    "ADMIN" = "Admin",
    "NORMAL" = "Normal",
    "FOCAL_POINT" = "Ponto-focal",
    "WRITER" = "Criador de posts",
}
export type SupposedReasonOfViolenceData = {
    id: string | null;
    name: string | null;
};
export type UserData = {
    id: string | null;
    name: string | null;
    email: string | null;
    contact: string | null;
    active: boolean | null;
    role: RoleData | any | null;
    organization: OrganizationData | any | null;
};
export type VictimCaseData = {
    id: string;
    caseCode: string;
    victim: any | VictimData;
    violenceType: any | ViolenceTypeData;
    perpetrator: any | PerpetratorData;
    periodOfViolenceAct: PeriodOfViolenceAct | null;
    violenceIncidentLocation: any | ViolenceIncidentLocationData;
    supposedReasonOfViolence: any | SupposedReasonOfViolenceData;
    violenceDetails: string | null;
    isViolenceCausedDeath: boolean | null;
    isTerminated: boolean | null;
    conclusion: string | null;
    caseRegisteredBy: any | UserData;
    caseRegisteredByOrganization: any | OrganizationData;
    caseRegisteredAt: string | null;
    caseRegisteredAddress: string | null;
    caseRegisteredAgent: string | null;
    caseRegisteredCity: string | null;
    caseRegisteredProvince: string | null;
    caseRegisteredDistrict: string | null;
    perpetratorRelationship: string | null;
    perpetratorName: string | null;
    perpetratorProfession: string | null;
    perpetratorAddress: string | null;
    perpetratorContact: string | null;
    perpetratorContactAlternative: string | null;
    isViolenceReportedToAuthorities: boolean;
    isTheFirstTime: boolean;
    lastViolencesDescription: string | null;
    isTheLastCasesReportedToAuthorities: boolean;
    areLastCasesResolved: boolean;
    lastCasesResolutionDetails: string | null;
};
export type VictimData = {
    id: string | null;
    name: string | null;
    age: number | null;
    gender: Gender;
    civil_state: CivilState;
    contact: string | null;
    profession: string | null;
    education_level: EducationLevel | null;
    contact_alternative: string | null;
    contact_person: string | null;
    city: string | null;
    neighborhood: string | null;
    address: string | null;
};
export type ViolenceIncidentLocationData = {
    id: string | null;
    name: string | null;
};
export type ViolenceTypeData = {
    id: string | null;
    name: string | null;
    description: string | null;
};
export type WebsiteMessageData = {
    id: string | null;
    name: string | null;
    message: string | null;
    email: string | null;
    contact: string | null;
    is_read: boolean | null;
    date: any;
};
