declare namespace App.Data {
    export type ArticleData = {
        id: string | null;
        title: string | null;
        slug: string | null;
        content: string | null;
        cover: App.Data.MediaData | null;
        sections: Array<any>;
        status: string;
        location: string | null;
        short_description: string;
    };
    export type ArticleSectionData = {
        id: string | null;
        title: string | null;
        content: string | null;
        cover: App.Data.MediaData | null;
    };
    export type BaseDataClass = {
        id: string | null;
        name: string | null;
    };
    export type DistrictData = {
        id: string | null;
        name: string | null;
        province: any | App.Data.ProvinceData | null;
    };
    export type MediaData = {
        id: number | null;
        file_name: string | null;
        name: string | null;
        mime_type: string | null;
        original_url: string | null;
        preview_url: string | null;
        size: number | null;
        custom_properties: Array<any> | null;
        responsive_images: App.Data.ResponsiveImageData | Array<any> | null;
        srcset: string | null;
    };
    export type MediaLibraryOriginalData = {
        base64svg: string | null;
        urls: Array<any> | null;
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
    export type PerpetratorData = {
        id: string | null;
        name: string | null;
    };
    export type ProvinceData = {
        id: string | null;
        name: string | null;
    };
    export type ResponsiveImageData = {
        media_library_original: App.Data.MediaLibraryOriginalData | null;
    };
    export type RoleData = {
        id: string | null;
        name: string | null;
    };
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
        role: App.Data.RoleData | any | null;
        organization: App.Data.OrganizationData | any | null;
    };
    export type VictimCaseData = {
        id: string | null;
        caseCode: string | null;
        victim: App.Data.VictimData | any;
        violenceType: App.Data.ViolenceTypeData | any;
        perpetrator: App.Data.BaseDataClass | any;
        periodOfViolenceAct: App.Enums.PeriodOfViolenceAct;
        violenceIncidentLocation: App.Data.BaseDataClass | any;
        supposedReasonOfViolence: App.Data.BaseDataClass | any;
        violenceDetails: any;
        isViolenceCausedDeath: boolean;
        progressStatus: App.Enums.CaseProgressStatus;
        updatedFields: any;
        organization: App.Data.OrganizationData | any;
        forwardedToOrganization: App.Data.OrganizationData | any;
        forwardedFromOrganization: App.Data.OrganizationData | any;
        isTerminated: boolean;
        conclusion: string | null;
        caseRegisteredBy: App.Data.UserData | any;
        caseUpdatedBy: App.Data.UserData | any;
    };
    export type VictimData = {
        id: string | null;
        name: string;
        age: number;
        gender: App.Enums.Gender;
        civil_state: App.Enums.CivilState;
        contact: string | null;
        profession: string | null;
        education_level: App.Enums.EducationLevel | null;
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
    export enum CivilState {
        "SINGLE" = "solteiro",
        "MARRIED" = "casado",
        "DIVORCED" = "divorciado",
        "WIDOWER" = "viúvo",
    }
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
    }
    export enum Gender {
        "FEMALE" = "Feminino",
        "MALE" = "Masculino",
        "LGBTQ_OTHER" = "LGBTQ+/Outro",
    }
    export enum PeriodOfViolenceAct {
        "MORNING" = "Manhã",
        "AFTERNOON" = "Tarde",
        "NIGHT" = "Noite",
        "DAWN" = "Madrugada",
    }
}
