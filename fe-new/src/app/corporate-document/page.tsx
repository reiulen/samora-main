'use client'
// import CorporateFile from "@/app/corporate-document/CorporateFile";
// import Shape from "@/components/Shape";
import React, { useState, useEffect } from "react";
// import SelectByPt from "./SelectByPt";
// import SelectByFunction from "./SelectByFunction";
// import SelectByType from "./SelectByType";

interface CorporateData {
  function: string;
  company: string;
  type: string;
  title: string;
  path: string;
}

// async function getData(): Promise<{ data: CorporateData[] }> {
//   const res = await fetch("http://127.0.0.1:8000/api/corporate-document");

//   if (!res.ok) {
//     throw new Error("Failed to fetch data");
//   }

//   return res.json();
// }

export default function Page(): JSX.Element {
  // const [selectedCompany, setSelectedCompany] = useState<string | null>(null);
  // const [selectedFunction, setSelectedFunction] = useState<string | null>(null);
  // const [selectedType, setSelectedType] = useState<string | null>(null);
  // const [data, setData] = useState<CorporateData[]>([]);

  // useEffect(() => {
  //   const fetchData = async () => {
  //     try {
  //       const result = await getData();
  //       setData(result.data);
  //     } catch (error) {
  //       console.error("Error fetching data:", error);
  //     }
  //   };

  //   fetchData();
  // }, []);

  // const handleSelectCompany = (company: string | null): void => {
  //   setSelectedCompany(company);
  // };

  // const handleSelectFunction = (func: string | null): void => {
  //   setSelectedFunction(func);
  // };

  // const handleSelectType = (type: string | null): void => {
  //   setSelectedType(type);
  // };

  // const renderCorporateFiles = (): JSX.Element[] => {
  //   const filteredData = data.filter((item) => {
  //     const companyFilter = selectedCompany
  //       ? item.company === selectedCompany
  //       : true;
  //     const functionFilter = selectedFunction
  //       ? item.function === selectedFunction
  //       : true;
  //     const typeFilter = selectedType ? item.type === selectedType : true;

  //     return companyFilter && functionFilter && typeFilter;
  //   });

  //   return filteredData.map((obj: CorporateData, index: number) => (
  //     <CorporateFile key={index} dataObj={obj} />
  //   ));
  // };

  return (
    <section className="pt-5">
      {/* <Shape size="w-2/12" />
      <SelectByPt
        dataPt={data.map((item) => item.company)}
        onSelectCompany={handleSelectCompany}
      />
      <section className="flex flex-row justify-start bg-[#f5f4ee] w-11/12">
        <SelectByFunction
          dataFunction={data.map((item) => item.function)}
          onSelectFunction={handleSelectFunction}
        />
        <SelectByType
          dataType={data.map((item) => item.type)}
          onSelectType={handleSelectType}
        />
        <h2 className="font-Gilroy font-bold text-xl text-biru py-3 w-5/12">
          NAMA DOCUMENT
        </h2>
        <h2 className="font-Gilroy font-bold text-xl text-biru py-3 w-2/12">
          PILIH
        </h2>
      </section>
      {renderCorporateFiles()} */}
    </section>
  );
}
