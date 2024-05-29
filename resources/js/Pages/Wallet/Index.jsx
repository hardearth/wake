import React, {useEffect} from 'react';
import RegisterWallet from "./RegisterWallet.jsx";
import {usePage} from "@inertiajs/react";

export default function Index() {
    const {userWallets} = usePage().props
    return (
        <div className="row pt-50">
            <div className="col-12">
                <div className="rounded-16 bg-white shadow-4 h-100">
                    <div className="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                        <div className="tabs -active-purple-2 js-tabs">
                            <div
                                className="tabs__controls d-flex items-center pt-20 px-30 border-bottom-light js-tabs-controls">
                                <button className="text-light-1 lh-12 tabs__button js-tabs-button is-active"
                                        data-tab-target=".-tab-item-1" type="button">
                                   Direcciones Registradas
                                </button>
                                <button className="text-light-1 lh-12 tabs__button js-tabs-button ml-30"
                                        data-tab-target=".-tab-item-2" type="button">
                                    Nuevo
                                </button>
                            </div>

                            <div className="tabs__content py-30 px-30 js-tabs-content">
                                <div className="tabs__pane -tab-item-1 is-active">
                                    <div>

                                        <div className="py-30 px-30">

                                                <table className="table table-hover table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Dirección</th>
                                                        <th>Proveedor</th>
                                                        <th>Red</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    {userWallets.map((item) => (
                                                        <tr key={item.id}>
                                                            <td>{item.id}</td>
                                                            <td>{item.wallet_address}</td>

                                                        </tr>
                                                    ))}
                                                    </tbody>
                                                </table>

                                        </div>
                                    </div>
                                </div>
                                <div className="tabs__pane -tab-item-2">
                                    <div className="col-12">
                                        <RegisterWallet />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
