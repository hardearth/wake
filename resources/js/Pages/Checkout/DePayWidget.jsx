import React, {useEffect, useState} from 'react';
import axios from 'axios';
import DePayWidgets from '@depay/widgets';
import {router, useForm, usePage} from '@inertiajs/react';

export default function DepayWidget() {

    let unmount
    const {payment} = usePage().props

    const openPaymentWidget = async () => {
        try {
            const {unmount} = await DePayWidgets.Payment({
                integration: '573d6b1d-31ba-473e-bc47-008315bdb598',
                accept: [
                    {
                        blockchain: 'polygon',
                        token: '0xEeeeeEeeeEeEeeEeEeEeeEEEeeeeEeeeeeeeEEeE',
                        receiver: '0xcA830aF6d618EC31fdc2cfbe077bD8b888707bB2'
                    }
                ],
                amount: payment.amount,
                succeeded: async (transaction) => {
                    try {

                        const response = await axios.post('/i/set/payment/' + payment.id, transaction);
                        // Redireccionar si la respuesta es true
                        if (response.data.completed === true) {


                            let url = '/cart/success/' + payment.user_bills_id;
                            // window.location.href = url;
                        }

                        const intervalId = setInterval(async () => {
                            const response = await fetch('/i/track/payment/' + payment.id);
                            const data = await response.json();
                            console.log(data)
                            if (data._succeeded) {
                                window.location.href = '/cart/success/' + payment.user_bills_id;
                                clearInterval(intervalId);
                            }
                        }, 5000); // Poll every 5 seconds


                    } catch (error) {
                        console.error(error);
                    }
                },
            });

            // Resto del código...
        } catch (error) {
            console.error(error);
        }
    };

    useEffect(() => {
        return () => {
            // make sure an open widgets gets closed/unmounted as part of this component
            if (unmount) {
                unmount()
            }
        }
    }, [])

    return (
        <div>
            <table>
                <tr>
                    <td>Monto</td>
                    <td>{payment.amount}</td>
                </tr>
            </table>
            <button onClick={openPaymentWidget} type="button" className="btn btn-outline-primary btn-lg col-md-12">
                Pay
            </button>
        </div>
    )
}
