import React from "react";
import DataTable from "./DataTable";

function Weapons(){
    return (
        <div className="card">
            <div className="card-header">Weapons</div>
            <div className="card-body">
                <DataTable
                    fetchUrl="/api/weapons"
                    columns={["name", "damage", 'is_range', 'used_by', 'heroes', "created_at"]}
                ></DataTable>
            </div>
        </div>
    )
}

export default Weapons;
