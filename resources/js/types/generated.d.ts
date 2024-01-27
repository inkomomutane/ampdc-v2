declare namespace App.Data {
    export type OrganizationData = {
        id: number | null;
        name: string | null;
        services: string | null;
    };
    export type UserData = {
        id: string | null;
        name: string | null;
        email: string | null;
    };
}
declare namespace App.Enums {
    export type CampaignEnum = "ACTIVE" | "PENDING" | "COMPLETED" | "SUSPENDED";
    export type CampaignPaymentMethodEnum = "M_PESA";
    export type CampaignPriorityEnum = "LOW" | "MEDIUM" | "HIGH" | "URGENT";
}
