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

export enum EducationLevel {
    "PRIMARY" = "Ensino Primário",
    "SECONDARY" = "Ensino Secundário",
    "TECHNICAL_PROFESSIONAL" = "Ensino Técnico Profissional",
    "UNIVERSITY" = "Ensino Universitário",
    "POSTGRADUATE" = "Pós-Graduação",
    "MASTER" = "Mestrado",
    "DOCTORATE" = "Doutoramento",
}
export interface KeyPair {
    key: string;
    value: string;
}

export function getArrayFromEnum(enumObject: any) {
    return Object.keys(enumObject).map((e) => {
        let f: KeyPair = {
            key: enumObject[e],
            value: enumObject[e],
        };
        return f;
    });
}
