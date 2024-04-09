declare namespace App.Data {
export type DistrictData = {
id: number | null;
name: string | null;
province: any | App.Data.ProvinceData | null;
};
export type NeighborhoodData = {
id: number | null;
name: string | null;
district: any | App.Data.DistrictData | null;
};
export type OrganizationData = {
id: string | null;
name: string | null;
services: string | null;
};
export type ProvinceData = {
id: number | null;
name: string | null;
};
export type UserData = {
id: string | null;
name: string | null;
email: string | null;
};
}
declare namespace App.Enums {
export type CampaignEnum = 'ACTIVE' | 'PENDING' | 'COMPLETED' | 'SUSPENDED';
export type CampaignPaymentMethodEnum = 'M_PESA';
export type CampaignPriorityEnum = 'LOW' | 'MEDIUM' | 'HIGH' | 'URGENT';
}
