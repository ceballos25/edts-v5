<div id="plantillaReciboHTML" style="max-width: 600px; margin: auto; font-family: 'Segoe UI', Arial, sans-serif; background-color: #f4f4f4; padding: 10px; margin-top: 25px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #1a1a1a; border-radius: 15px; overflow: hidden; color: #ffffff; border-collapse: collapse;">
        
        <tr>
            <td align="center" style="padding: 25px 15px; border-bottom: 2px solid #d4af37;">
                <h1 style="color: #d4af37; margin: 0; font-size: 24px; letter-spacing: 2px; text-transform: uppercase;">CABALLOS REVELO</h1>
                <p style="margin: 8px 0 0; font-size: 11px; color: #aaaaaa; text-transform: uppercase; letter-spacing: 1px;">Comprobante de Venta Oficial</p>
            </td>
        </tr>
        
        <tr>
            <td style="padding: 25px 25px 10px;">
                <p style="font-size: 15px; margin: 0; color: #ffffff;">
                    Hola, <br>
                    <strong style="color: #d4af37; font-size: 18px; display: block; margin-top: 5px;">
                        {Nombre Cliente}
                    </strong>
                </p>
            </td>
        </tr>

        <tr>
            <td style="padding: 0 25px 20px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 13px; color: #cccccc; border-top: 1px solid #333333; padding-top: 15px;">
                    
                    <tr>
                        <td style="padding: 4px 0;"><strong>ID:</strong></td>
                        <td align="right" style="padding: 4px 0; color: #ffffff;">#{ID}</td>
                    </tr>

                    <tr>
                        <td style="padding: 4px 0;"><strong>Fecha Compra:</strong></td>
                        <td align="right" style="padding: 4px 0; color: #ffffff;">{Fecha}</td>
                    </tr>

                    <tr>
                        <td style="padding: 4px 0;"><strong>Juega:</strong></td>
                        <td align="right" style="padding: 4px 0; color: #d4af37; font-weight: bold;">
                             17 de abril Por la de Medellin
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 4px 0;"><strong>Cant. Números:</strong></td>
                        <td align="right" style="padding: 4px 0; color: #ffffff;">{Cantidad}</td>
                    </tr>

                    <tr>
                        <td colspan="2" style="padding: 10px 0 4px;">
                            <strong>Código de Seguridad:</strong>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" style="padding: 5px; background-color: #000000; border-radius: 5px; color: #d4af37; font-family: monospace; font-size: 16px; word-break: break-all; text-align: center;">
                            {Codigo}
                        </td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr>
            <td align="center" style="padding: 0 20px 30px;">
                <div style="background-color: rgba(212, 175, 55, 0.05); border: 1px dashed #d4af37; border-radius: 12px; padding: 20px;">
                    
                    <p style="margin: 0 0 15px; font-size: 12px; color: #d4af37; font-weight: bold; letter-spacing: 1px;">
                        TUS NÚMEROS
                    </p>

                    <div>
                        {NumerosHTML}
                    </div>

                </div>
            </td>
        </tr>

        <tr>
            <td align="center" style="padding: 15px 15px; background-color: #000000;">
                
                <p style="margin: 0; color: #888888; font-size: 12px; text-transform: uppercase;">
                    Total Pagado
                </p>

                <h2 style="margin: 5px 0 25px; color: #d4af37; font-size: 20px; font-weight: bold;">
                    {Total}
                </h2>
                
                <table border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        
                        <td style="padding: 0 8px;">
                            <a href="https://wa.me/57573193162268?text=Hola%20"
                               style="color: #d4af37; text-decoration: none; font-size: 11px; font-weight: bold; text-transform: uppercase;">
                               WhatsApp
                            </a>
                        </td>

                        <td style="padding: 0 8px;">
                            <a href="https://chat.whatsapp.com/DQNYKA2NJq69HLrs9pDpAk"
                               style="background-color: #d4af37; color: #000000; padding: 10px 18px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 11px; text-transform: uppercase; display: inline-block;">
                               Ir al Grupo
                            </a>
                        </td>

                        <td style="padding: 0 8px;">
                            <a href="https://www.instagram.com/caballosrevelo"
                               style="color: #d4af37; text-decoration: none; font-size: 11px; font-weight: bold; text-transform: uppercase;">
                               Instagram
                            </a>
                        </td>

                    </tr>
                </table>

                <p style="margin: 20px 0 0; font-size: 10px; color: #555555;">
                    Hemos enviado una copia a tu correo electrónico.
                </p>

            </td>
        </tr>

    </table>
</div>