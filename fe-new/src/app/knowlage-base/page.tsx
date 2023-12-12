"use client";
// page.tsx
import React, { useState, useEffect } from "react";
// import { IoIosArrowDropdown } from "react-icons/io";
// import Shape from "@/components/Shape";
// import KnowledgeFile from "./KnowledgeFile";

interface KnowledgeBaseData {
  id: number;
  legal: string;
  title: string;
  path: string;
}

// async function getData(): Promise<{ data: KnowledgeBaseData[] }> {
//   const res = await fetch("http://127.0.0.1:8000/api/knowledge-base");

//   if (!res.ok) {
//     throw new Error("Failed to fetch data");
//   }

//   return res.json();
// }

export default function Page() {
  // const [open, setOpen] = useState(false);
  // const [userSelect, setUserSelect] = useState("");
  // const [data, setData] = useState<KnowledgeBaseData[]>([]);

  // const handleChange = (d: string) => {
  //   setUserSelect(d);
  //   setOpen(false);
  // };

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

  // // Filter data berdasarkan pilihan pengguna
  // const filteredData = userSelect
  //   ? data.filter((item) => item.legal === userSelect)
  //   : data;

  // const handleShowAll = () => {
  //   setUserSelect(""); // Set userSelect ke string kosong untuk menampilkan semua data
  //   setOpen(false);
  // };

  return (
    <section className="pt-5">
      {/* <Shape size="w-2/12" />
      <h2 className="font-Gilroy font-bold text-3xl text-biru py-3">
        KNOWLEDGE BASE
      </h2>
      <section className="flex mt-5 flex-row justify-start bg-[#f5f4ee] w-11/12 px-3 relative">
        <div className="w-4/12 relative">
          <div className="absolute left-0">
            <button
              onClick={() => setOpen(!open)}
              className="flex items-center gap-1"
            >
              <h2 className="font-Gilroy font-bold text-xl text-biru py-3">
                FUNCTION
              </h2>
              <IoIosArrowDropdown size={30} color="#000371" />
            </button>
            {open ? (
              <>
                <button
                  onClick={handleShowAll}
                  className="flex items-center gap-1 bg-[#f5f4ee] hover:bg-slate-200 px-5 w-full"
                >
                  <h2 className="font-Gilroy font-bold text-xl text-biru py-3">
                    All
                  </h2>
                </button>
                {data.map((d: any, index) => (
                  <button
                    onClick={() => handleChange(d.legal)}
                    key={index}
                    className="flex items-center gap-1 bg-[#f5f4ee] hover:bg-slate-200 px-5 w-full"
                  >
                    <h2 className="font-Gilroy font-bold text-xl text-biru py-3">
                      {d.legal.toUpperCase()}
                    </h2>
                  </button>
                ))}
              </>
            ) : null}
          </div>
        </div>
        <h2 className="font-Gilroy font-bold text-xl text-biru py-3 w-6/12">
          NAMA FILE
        </h2>
        <h2 className="font-Gilroy font-bold text-xl text-biru py-3 w-2/12">
          PILIH
        </h2>
      </section>
      {filteredData.map((d) => (
        <KnowledgeFile file={d} key={d.id} />
      ))} */}
    </section>
  );
}
