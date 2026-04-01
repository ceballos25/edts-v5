<div id="voucherCapture">
<div style="max-width:560px;margin:22px auto;font-family:'Segoe UI',Arial,sans-serif;background:#111111;padding:14px;border-radius:18px;">

    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="
        background:#1a1a1a;
        border-radius:16px;
        overflow:hidden;
        color:#ffffff;
        border-collapse:collapse;
        border:1px solid #00ff00;
        box-shadow:0 8px 32px rgba(0,255,0,0.15);
    ">

        <!-- HEADER -->
        <tr>
            <td style="padding:16px 20px;border-bottom:2px solid #00ff00;background:#111111;">
                <table width="100%">
                    <tr>
                        <td align="left">
                            <h1 style="color:#00ff00;margin:0;font-size:22px;letter-spacing:3px;font-weight:700;text-transform:uppercase;">
                                El día de TU SUERTE
                            </h1>
                            <p style="margin:4px 0 0;font-size:10px;color:#888;text-transform:uppercase;letter-spacing:2px;">
                                El poder de ganar empieza aquí
                            </p>
                        </td>
                        <td align="right" style="vertical-align:middle;">
                            <a href="javascript:void(0)" onclick="shareVoucher(this)" title="Compartir"
                               style="display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:50%;background:#222;border:1px solid #00ff00;text-decoration:none;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#00ff00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="18" cy="5" r="3"></circle>
                                    <circle cx="6" cy="12" r="3"></circle>
                                    <circle cx="18" cy="19" r="3"></circle>
                                    <line x1="8.6" y1="13.5" x2="15.4" y2="17.5"></line>
                                    <line x1="15.4" y1="6.5" x2="8.6" y2="10.5"></line>
                                </svg>
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- SALUDO -->
        <tr>
            <td style="padding:22px 25px 10px;" align="left">
                <p style="font-size:13px;margin:0;color:#aaa;">Hola,</p>
                <strong style="color:#ffbc42;font-size:16px;display:block;margin-top:6px;">
                    {Nombre Cliente}
                </strong>
            </td>
        </tr>

        <!-- INFO -->
        <tr>
            <td style="padding:0 25px 20px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:12px;border-top:1px solid #333;padding-top:15px;">
                    
                    <tr>
                        <td style="padding:7px 0;color:#aaa;"><strong>ID:</strong></td>
                        <td align="right" style="padding:7px 0;color:#fff;">#{ID}</td>
                    </tr>

                    <tr>
                        <td style="padding:7px 0;color:#aaa;"><strong>Fecha Compra:</strong></td>
                        <td align="right" style="padding:7px 0;color:#fff;">{Fecha}</td>
                    </tr>

                    <tr>
                        <td style="padding:7px 0;color:#aaa;"><strong>Cant. Números:</strong></td>
                        <td align="right" style="padding:7px 0;color:#ffbc42;font-weight:bold;">{Cantidad}</td>
                    </tr>

                    <!-- CÓDIGO -->
                    <tr>
                        <td colspan="2" style="padding:12px 0 6px;color:#aaa;">
                            <strong>Código de Seguridad:</strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:12px;background:#111;border-radius:10px;color:#00ff00;font-family:monospace;font-size:15px;text-align:center;border:1px solid #00ff00;font-weight:bold;letter-spacing:2px;">
                            {Codigo}
                        </td>
                    </tr>

                </table>
            </td>
        </tr>

        <!-- NÚMEROS -->
        <tr>
            <td align="center" style="padding:0 20px 30px;">
                <div style="background:#111;border:2px dashed #ffbc42;border-radius:14px;padding:22px;">
                    <p style="margin:0 0 15px;font-size:11px;color:#ffbc42;font-weight:bold;letter-spacing:2px;text-transform:uppercase;">
                        Tus Números
                    </p>
                    <div style="font-size:14px;">
                        {NumerosHTML}
                    </div>
                </div>
            </td>
        </tr>

        <!-- FOOTER -->
        <tr>
            <td align="center" style="padding:25px 15px;background:#111111;border-top:1px solid #222;">
                
                <p style="margin:0;color:#888;font-size:11px;text-transform:uppercase;letter-spacing:1px;">
                    Total Pagado
                </p>

                <h2 style="margin:8px 0 25px;color:#00ff00;font-size:22px;font-weight:700;">
                    {Total}
                </h2>

                <a href="{GrupoUrl}"
                   style="background:linear-gradient(135deg,#00ff00,#00cc00);color:#000000;padding:11px 28px;border-radius:999px;text-decoration:none;font-weight:bold;font-size:12px;text-transform:uppercase;display:inline-block;letter-spacing:1px;">
                   Ir al grupo
                </a>

                <p style="margin:20px 0 0;font-size:10px;color:#555;">
                    Hemos enviado una copia a tu correo electrónico.
                </p>

            </td>
        </tr>

    </table>
</div>
</div>