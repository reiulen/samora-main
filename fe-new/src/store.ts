import { create } from "zustand";

interface CorporateDocument {
    function: string;
    company: string;
    type: string;
    title: string;
    path: string;
}

type Store = {
  CorporateDocumentsDatas: CorporateDocument[];
  setCorporateDocumentsDatas: (e: CorporateDocument[]) => void;
};

const useStore = create<Store>()((set) => ({
  CorporateDocumentsDatas: [],
  setCorporateDocumentsDatas: (newData: CorporateDocument[]) =>
    set((state) => ({ CorporateDocumentsDatas: newData })),
}));

export default useStore;
