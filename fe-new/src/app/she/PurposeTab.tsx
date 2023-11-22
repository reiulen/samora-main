import React from "react";
import Shape from "../../components/Shape";

export default function PurposeTab({ title = "default" }) {
  return (
    <section className="p-5 w-11/12 bg-gray-200">
      <Shape size="w-2/12" />
      <h3 className="text-biru text-2xl font-Gilroy font-bold pt-3">{title}</h3>
    </section>
  );
}
