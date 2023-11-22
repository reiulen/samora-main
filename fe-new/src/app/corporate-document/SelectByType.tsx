import React, { useState } from "react";
import { IoIosArrowDropdown } from "react-icons/io";

interface SelectByTypeProps {
  dataType: string[];
  onSelectType: (selectedType: string | null) => void;
}

export default function SelectByType({
  dataType,
  onSelectType,
}: SelectByTypeProps): JSX.Element {
  const [openTypeOption, setOpenTypeOption] = useState(false);
  const [selectType, setSelectType] = useState("TYPE");

  // Menggunakan Set untuk menyimpan jenis unik
  const uniqueTypes = Array.from(new Set(dataType));

  const handleChangeSelectType = (selectedType: string): void => {
    setSelectType(selectedType);
    setOpenTypeOption(false);
    onSelectType(selectedType === "All" ? null : selectedType);
  };

  return (
    <div className="w-2/12 relative">
      <div className="flex flex-col absolute">
        <button
          onClick={() => setOpenTypeOption(!openTypeOption)}
          className="flex items-center gap-1"
        >
          <h2 className="font-Gilroy font-bold text-xl text-biru py-3">
            {selectType === "All" ? "TYPE" : "TYPE"}
          </h2>
          <IoIosArrowDropdown size={30} color="#000371" />
        </button>
        {openTypeOption
          ? ["All", ...uniqueTypes].map((type, index) => (
              <button
                onClick={() => handleChangeSelectType(type)}
                key={index}
                className="flex items-center gap-1 bg-[#f5f4ee] ps-3 hover:bg-slate-200"
              >
                <h2 className="font-Gilroy font-bold text-xl text-biru py-3 pe-5">
                  {type.toUpperCase()}
                </h2>
              </button>
            ))
          : null}
      </div>
    </div>
  );
}
