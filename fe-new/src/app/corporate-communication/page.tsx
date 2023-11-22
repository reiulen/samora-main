'use client'
// page.tsx
import { useState, useEffect } from "react";
import { IoIosArrowDropdown } from "react-icons/io";
import CommunicationFile from "./CommunicationFile";
import Shape from "@/components/Shape";

interface CorporateCommunicationData {
  id: number;
  title: string;
  type: string;
  path: string;
}

async function getData(): Promise<{ data: CorporateCommunicationData[] }> {
  const res = await fetch("http://127.0.0.1:8000/api/corporate-communication");

  if (!res.ok) {
    throw new Error("Failed to fetch data");
  }

  return res.json();
}

export default function Page() {
  const [open, setOpen] = useState(false);
  const [userSelect, setUserSelect] = useState("");
  const [data, setData] = useState<CorporateCommunicationData[]>([]);
  const [uniqueType, setUniqueType] = useState<string[]>([]);

  const handleChange = (d: string) => {
    setUserSelect(d);
    setOpen(false);
  };

  useEffect(() => {
    const fetchData = async () => {
      try {
        const result = await getData();
        const uniqueType = ["All", ...Array.from(new Set(result.data.map((d) => d.type)))];
        setUniqueType(uniqueType);
        setData(result.data);
      } catch (error) {
        console.error("Error fetching data:", error);
      }
    };

    fetchData();
  }, []);

  return (
    <section className="pt-5">
      <Shape size="w-2/12" />
      <h2 className="font-Gilroy font-bold text-3xl text-biru py-3">
        CORPORATE COMMUNICATIONS
      </h2>
      <section className="flex mt-5 flex-row justify-start gap-5 bg-[#f5f4ee] w-11/12 px-3 relative">
        <div className="w-4/12 relative">
          <div className="absolute left-0">
            <button
              onClick={() => setOpen(!open)}
              className="flex items-center gap-1"
            >
              <h2 className="font-Gilroy font-bold text-xl text-biru py-3">
                JENIS FILE
              </h2>
              <IoIosArrowDropdown size={30} color="#000371" />
            </button>
            {open
              ? uniqueType.map((type, index) => (
                  <button
                    onClick={() => handleChange(type)}
                    key={index}
                    className="flex items-center gap-1 bg-[#f5f4ee] hover:bg-slate-200 px-5 w-full"
                  >
                    <h2 className="font-Gilroy font-bold text-xl text-biru py-3">
                      {type.toUpperCase()}
                    </h2>
                  </button>
                ))
              : null}
          </div>
        </div>
        <h2 className="font-Gilroy font-bold text-xl text-biru py-3 w-6/12">
          NAMA FILE
        </h2>
        <h2 className="font-Gilroy font-bold text-xl text-biru py-3 w-2/12">
          PILIH
        </h2>
      </section>

      {userSelect === "All"
        ? data.map((file, index) => (
            <CommunicationFile key={index} file={file} />
          ))
        : data
            .filter((item) =>
              userSelect === "" ? true : item.type === userSelect
            )
            .map((file, index) => (
              <CommunicationFile key={index} file={file} />
            ))}
    </section>
  );
}
