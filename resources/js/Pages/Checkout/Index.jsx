import React, {useEffect, useState} from 'react';
import {router, useForm, usePage} from '@inertiajs/react';
import DepayWidget from "./DePayWidget";

export default function Index() {

    const {countries,payment} = usePage().props
    // const [payment, setPayment] = useState(null)
    const {data, setData, post, errors, wasSuccessful} = useForm({
        name: '',
        lastname: '',
        countries_id: '',
        city: '',
        cellphone: '',
        email: '',
    });

    function handleChange(e) {
        const {id, value} = e.target;
        setData({
            ...data,
            [id]: value,
        });
    }

    function handleSubmit(e) {
        e.preventDefault();
        post('/cart/place/order')
    }


    return (
        <div>
            <section data-anim="fade" className="breadcrumbs is-in-view">
                <div className="container">
                    <div className="row">
                        <div className="col-auto">
                            <div className="breadcrumbs__content">

                                <div className="breadcrumbs__item ">
                                    <a href="#">Inicio</a>
                                </div>

                                <div className="breadcrumbs__item ">
                                    <a href="#">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section className="page-header -type-1">
                <div className="container">
                    <div className="page-header__content">
                        <div className="row justify-center text-center">
                            <div className="col-auto">
                                <div data-anim="slide-up delay-1" className="is-in-view">

                                    <h1 className="page-header__title">Checkout</h1>

                                </div>

                                <div data-anim="slide-up delay-2" className="is-in-view">

                                    <p className="page-header__text">Faltan pocos pasos para finalizar tu
                                        compra.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section className="layout-pt-md layout-pb-lg">
                <div className="container">
                    {wasSuccessful && payment ? (
                        // Lo que quieres mostrar después de que el formulario se ha enviado exitosamente
                        <div>
                            <DepayWidget payment={payment}/>
                        </div>
                    ) : (
                        <div className="row y-gap-50">
                            <div className="col-lg-8">
                                <div className="shopCheckout-form">
                                    <form onSubmit={handleSubmit}
                                          className="contact-form row x-gap-30 y-gap-30">
                                        <div className="col-12">
                                            <h5 className="text-20">Datos de la facturación</h5>
                                        </div>
                                        <div className="col-sm-6">
                                            <label className="text-16 lh-1 fw-500 text-dark-1 mb-10">Nombre</label>
                                            <input type="text" id="name" placeholder="Nombre" required
                                                   onChange={handleChange} value={data.name}/>
                                            {errors.name && <span>{errors.name}</span>}
                                        </div>

                                        <div className="col-sm-6">
                                            <label
                                                className="text-16 lh-1 fw-500 text-dark-1 mb-10">Apellido</label>
                                            <input type="text" id="lastname" placeholder="Apellido"
                                                   onChange={handleChange} value={data.lastname}/>
                                        </div>

                                        <div className="col-12">
                                            <label className="text-16 lh-1 fw-500 text-dark-1 mb-10">Región
                                                *</label>
                                            <select id="countries_id"
                                                    className="text-16 lh-1 fw-500 text-dark-1 mb-10"
                                                    onChange={handleChange} value={data.countries_id}>
                                                <option value="">Seleccione...</option>
                                                {countries.map((countries) => (
                                                    <option key={countries.id} value={countries.id}>
                                                        {countries.name}
                                                    </option>
                                                ))}
                                            </select>
                                        </div>

                                        <div className="col-sm-6">
                                            <label className="text-16 lh-1 fw-500 text-dark-1 mb-10">Ciudad
                                                *</label>
                                            <input type="text" id="city" placeholder="Ciudad *" required
                                                   onChange={handleChange} value={data.city}/>
                                        </div>
                                        <div className="col-sm-6">
                                            <label className="text-16 lh-1 fw-500 text-dark-1 mb-10">Celular</label>
                                            <input type="text" id="cellphone" placeholder="Teléfono *" required
                                                   onChange={handleChange} value={data.cellphone}/>
                                        </div>

                                        <div className="col-12">
                                            <label className="text-16 lh-1 fw-500 text-dark-1 mb-10">Correo</label>
                                            <input type="email" id="email" placeholder="Correo*" required
                                                   onChange={handleChange} value={data.email}/>
                                        </div>
                                        <div className='col-12'>
                                            <button type="submit" className="btn btn-primary">Continuar</button>

                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div className="col-lg-4">
                                <div className="">
                                    <div className="pt-30 pb-15 border-light rounded-8 bg-light-4">
                                        <h5 className="px-30 text-20 fw-500">
                                            Tu Orden
                                        </h5>

                                        <div className="d-flex justify-between px-30 mt-25">
                                            <div className="py-15 fw-500 text-dark-1">Productos</div>
                                            <div className="py-15 fw-500 text-dark-1">Subtotal</div>
                                        </div>

                                    </div>

                                    <div className="py-30 px-30  mt-30 border-light rounded-8 bg-light-4">
                                        <h5 className="text-20 fw-500">
                                            Pago
                                        </h5>

                                    </div>
                                </div>
                            </div>
                        </div>

                    )}
                </div>
            </section>
        </div>
    );
}
