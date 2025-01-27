<?php require_once 'req/start.php'; ?>

    <title>FAQ - <?=$general['site_title']->value;?></title>

<?php require_once 'req/head.php'; ?>
    <!-- SPECIFIC CSS -->
    <link href="lib/css/blog.css" rel="stylesheet">

<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>

    <main>
        <section class="hero_in general">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>FAQ </h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="container margin_60_35">
            <div class="row">
                <aside class="col-lg-3" id="sidebar">
                    <div class="box_style_cat" id="faq_box">
                        <ul id="cat_nav">
                            <li><a href="#payment" class="active"><i class="icon_document_alt"></i>Check-in und Check-out</a></li>
                            <li><a href="#tips"><i class="icon_document_alt"></i>Ändern & Stornieren</a></li>
                            <li><a href="#reccomendations"><i class="icon_document_alt"></i>Zahlung & Beleg</a></li>
                            <li><a href="#terms"><i class="icon_document_alt"></i>Zahlungsoptionen des Hotels</a></li>
                            <li><a href="#booking"><i class="icon_document_alt"></i>All-inclusive Hotels und Resorts</a></li>
                            <li><a href="#booking2"><i class="icon_document_alt"></i>Datenschutz</a></li>
                        </ul>
                    </div>
                    <!--/sticky -->
                </aside>
                <!--/aside -->

                <div class="col-lg-9" id="faq">
                    <h4 class="nomargin_top">Check-in und Check-out</h4>
                    <p>Die Check-in-Zeit und die Telefonnummer des Hotels finden Sie in Ihrer Bestätigungs-E-Mail.</p>
                    <div role="tablist" class="add_bottom_45 accordion_2" id="payment">
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseOne_payment" aria-expanded="true"><i class="indicator ti-minus"></i>Check-in</a>
                                </h5>
                            </div>

                            <div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
                                <div class="card-body">
                                    <ul class="bullets">
                                        <li>Zum Einchecken benötigen Sie ein amtliches Ausweisdokument.</li>
                                        <li>Bei den meisten Hotels können Sie zwischen der frühesten Check-in-Zeit und Mitternacht anreisen.</li>
                                        <li>Rufen Sie das Hotel direkt an, wenn Sie ein früheres Check-in benötigen.</li>
                                        <li>Zimmer, die bei Sungate24 gebucht wurden, sind auch bei später Anreise garantiert.</li>
                                        <li>Wenn Sie nach Mitternacht ankommen, kontaktieren Sie bitte das Hotel direkt, um sicherzustellen, dass Ihr Zimmer für Sie reserviert bleibt.</li>
                                        <li>Wenn Sie nicht während der Check-in-Zeiten Ihres Hotels anreisen oder nicht ohne vorherige Stornierung anreisen, stellt das Hotel möglicherweise eine Gebühr für die Nichtanreise in Rechnung. Die Höhe dieser Gebühr kann variieren. Genauere Details können Sie den Richtlinien Ihres Hotels entnehmen.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo_payment" aria-expanded="false">
                                        <i class="indicator ti-plus"></i>Check-out
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo_payment" class="collapse" role="tabpanel" data-parent="#payment">
                                <div class="card-body">
                                    <ul class="bullets">
                                        <li>Sie können am letzten Tag Ihrer Buchung jederzeit vor der Check-out-Zeit des Hotels auschecken.</li>
                                        <li>Rufen Sie das Hotel direkt an, wenn Sie eine spätere Abreise benötigen. Bitte beachten Sie dabei, dass dafür möglicherweise Gebühren anfallen.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseThree_payment" aria-expanded="false">
                                        <i class="indicator ti-plus"></i>Vorzeitiges Auschecken
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree_payment" class="collapse" role="tabpanel" data-parent="#payment">
                                <div class="card-body">
                                    <p>Sie müssen Ihren Aufenthalt vorzeitig beenden?</p>
                                    <ul class="bullets">
                                        <li>Wenn Sie im Voraus für Ihr Hotel bezahlt haben, können Sie uns</li>
                                        <li>Wenn Sie im Hotel für Ihren Aufenthalt bezahlen, rufen Sie direkt im Hotel an.</li>
                                    </ul>
                                    <p>Änderungen an Ihrer Buchung, die während Ihres Aufenthalts vorgenommen werden, können zusätzliche Kosten verursachen. Die Stornierungsbedingungen Ihres Hotels können Sie in Ihrer Bestätigungs-E-Mail oder in Ihrer Buchung online nachlesen.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->

                        <!-- /card -->
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseFour_payment" aria-expanded="false">
                                        <i class="indicator ti-plus"></i>Wissenswertes
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseFour_payment" class="collapse" role="tabpanel" data-parent="#payment">
                                <div class="card-body">
                                    <ul class="bullets">
                                        <li>Obwohl eine ausgedruckte Kopie Ihres Reiseplans für den Check-in nicht vonnöten ist, kann es sinnvoll sein, ihn vorliegen zu haben.</li>
                                        <li>Näheres zu Zahlungsmöglichkeiten, Mindestalter für den Check-in sowie Gepäckaufbewahrung finden Sie im Abschnitt über Hotelinformationen auf Ihrer Hotelseite. Wenn die Information, nach der Sie suchen, nicht aufgeführt ist, kontaktieren Sie bitte Ihr Hotel.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->
                    </div>
                    <!-- /accordion payment -->

                    <h4 class="nomargin_top">Ändern & Stornieren</h4>
                    <div role="tablist" class="add_bottom_45 accordion_2" id="tips">
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseOne_tips" aria-expanded="true"><i class="indicator ti-plus"></i>Ihre Hotel- oder Feriendomizilbuchung stornieren</a>
                                </h5>
                            </div>

                            <div id="collapseOne_tips" class="collapse" role="tabpanel" data-parent="#tips">
                                <div class="card-body">
                                    <p>Planänderung? Kein Problem. Bei uns können Sie die meisten Hotelbuchungen ganz einfach online stornieren. Ob Sie Ihr Geld zurückerhalten, hängt von der Art der Buchung ab und ob die Anreise kurz bevorsteht.</p>
                                    <p>Hier sind die wichtigsten Fakten auf einen Blick:</p>
                                    <ul class="bullets">
                                        <li>Erstattungsfähige Buchung? Gute Nachrichten – Sie erhalten Ihr Geld zurück, solange die Anreise nicht unmittelbar bevorsteht. Hotels haben hierfür ihre eigenen Richtlinien, daher sollten Sie das Kleingedruckte auf Ihrem Reiseplan beachten.</li>
                                        <li>Nicht erstattungsfähige Buchung? Wie der Name schon sagt, erhalten Sie in diesem Fall kein Geld zurück.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo_tips" aria-expanded="false">
                                        <i class="indicator ti-plus"></i>So stornieren Sie Ihr Hotel
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo_tips" class="collapse" role="tabpanel" data-parent="#tips">
                                <div class="card-body">
                                    <p>Für Stornierungsanfragen senden Sie uns bitte eine Email an info@sungate24.com Wir nehmen mit Ihnen Kontakt auf. </p>
                                    <ul class="bullets">
                                        <li>Gehen Sie zu Reisen verwalten – Reisepläne. (Möglicherweise müssen Sie sich dazu anmelden.)</li>
                                        <li>Wählen Sie unter Buchung verwalten die Option Buchung stornieren. Die weiteren Schritte sind ganz einfach und selbsterklärend.</li>
                                    </ul>
                                    <p>Ihnen wird keine Option zum Stornieren angezeigt? Das könnte bedeuten, dass</p>
                                    <ul class="bullets">
                                        <li>Die Anreise unmittelbar bevorsteht oder die Buchung nicht erstattungsfähig ist: In beiden Fällen ist eine Online-Stornierung nicht möglich. Nehmen Sie stattdessen</li>
                                        <li>Auf; wir führen die Stornierung dann für Sie durch. Denken Sie jedoch daran, dass das Hotel möglicherweise eine Gebühr berechnet.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseThree_tips" aria-expanded="false">
                                        <i class="indicator ti-plus"></i>So stornieren Sie Ihr Feriendomizil
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree_tips" class="collapse" role="tabpanel" data-parent="#tips">
                                <div class="card-body">
                                    <p>Bei Feriendomizilen funktioniert das Stornieren etwas anders als bei normalen Hotels. Um eine Stornierung durchzuführen, müssen Sie Ihre Agentur kontaktieren. Sie finden die jeweiligen Kontaktinformationen auf Ihrem Reiseplan – die Agentur hilft Ihnen gerne weiter.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->
                        <!-- /card -->
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseFour_tips" aria-expanded="false">
                                        <i class="indicator ti-plus"></i>Sonstige hilfreiche Informationen
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseFour_tips" class="collapse" role="tabpanel" data-parent="#tips">
                                <div class="card-body">
                                    <ul class="bullets">
                                        <li>Sie müssen nur etwas ändern? Versuchen Sie, Ihre Buchung zu ändern, statt zu stornieren.</li>
                                        <li>Was passiert bei Nichterscheinen? Wenn Sie die Buchung nicht wahrnehmen oder außerhalb der Check-in-Zeiten anreisen, kann Ihnen das Hotel eine entsprechende Gebühr in Rechnung stellen. Im Abschnitt zu den Richtlinien und Einschränkungen auf Ihrem Reiseplan finden Sie das Kleingedruckte.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->
                        <!-- /card -->
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseThree1_tips" aria-expanded="false">
                                        <i class="indicator ti-plus"></i> Sind noch Fragen offen?
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree1_tips" class="collapse" role="tabpanel" data-parent="#tips">
                                <div class="card-body">
                                    <p>Nehmen Sie Kontakt mit uns auf. Wir sind für Sie da.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /card --><!-- /card -->
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseThree2_tips" aria-expanded="false">
                                        <i class="indicator ti-plus"></i> Fehler bei der Hotelbuchung
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree2_tips" class="collapse" role="tabpanel" data-parent="#tips">
                                <div class="card-body">
                                    <p>Falls Sie eine Unstimmigkeit in Ihrer Buchung finden oder mehrere Reisepläne für dieselbe Reise haben, können Sie die Buchung meist online stornieren, ohne dass eine Stornierungsgebühr fällig wird. Nachdem Sie storniert haben, können Sie Ihre Reise mit den gewünschten Reisedetails neu buchen.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->
                        <!-- /card -->
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseFour22_tips" aria-expanded="false">
                                        <i class="indicator ti-plus"></i> So stornieren Sie Ihre Buchung
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseFour_tips" class="collapse" role="tabpanel" data-parent="#tips">
                                <div class="card-body">
                                    <ul class="bullets">
                                        <li>Melden Sie sich an und rufen Sie Ihre Buchungen auf.</li>
                                        <li>Wählen Sie unter <strong>Bevorstehend</strong> den Namen oder die Nummer des Reiseplans, den Sie stornieren möchten.</li>
                                        <li>Unter <strong>Buchung verwalten</strong> gehen Sie dann auf <strong>Stornieren</strong> und schließen die Stornierung ab.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->
                    </div>
                    <!-- /accordion suggestions -->

                    <h4 class="nomargin_top">Zahlung & Beleg</h4>
                    <div role="tablist" class="add_bottom_45 accordion_2" id="reccomendations">
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseOne_reccomendations" aria-expanded="true"><i class="indicator ti-plus"></i>Beleg für eine Hotelbuchung erhalten</a>
                                </h5>
                            </div>

                            <div id="collapseOne_reccomendations" class="collapse" role="tabpanel" data-parent="#reccomendations">
                                <div class="card-body">
                                    <p>Vorgehensweise</p>
                                    <ul class="bullets">
                                        <li>Melden Sie sich an und rufen Sie Ihre Buchungen auf.</li>
                                        <li>Gehen Sie zu Bevorstehend oder Abgeschlossen und wählen Sie Ihren Reiseplan aus.</li>
                                        <li>Im Abschnitt Preisübersicht des Reiseplans wählen Sie Beleg anfordern.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo_reccomendations" aria-expanded="false">
                                        <i class="indicator ti-plus"></i> Wenn Sie ohne Anmeldung gebucht haben
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo_reccomendations" class="collapse" role="tabpanel" data-parent="#reccomendations">
                                <div class="card-body">
                                    <ul class="bullets">
                                        <li>Gehen Sie auf „Finden Sie Ihre Reisepläne ohne Anmeldung.“</li>
                                        <li>Geben Sie dann Ihre E-Mail-Adresse und Ihre Reiseplannummer ein und klicken Sie auf Reiseplan finden</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseThree_reccomendations" aria-expanded="false">
                                        <i class="indicator ti-plus"></i> Rufen Sie die Seite „Reiseplannummer nicht verfügbar?” auf.
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree_reccomendations" class="collapse" role="tabpanel" data-parent="#reccomendations">
                                <div class="card-body">
                                    <ul class="bullets">
                                        <li>Geben Sie Ihre E-Mail-Adresse ein und klicken Sie auf Reiseplan senden. Sie erhalten dann per E-Mail eine Auflistung Ihrer Reisepläne bei ebookers.</li>
                                        <li>Wählen Sie den gewünschten Reiseplan aus der Liste, die Sie per E-Mail erhalten, aus.</li>
                                        <li>Im Abschnitt Preisübersicht des Reiseplans wählen Sie Beleg anfordern.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->
                        <!-- /card -->
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseThree_reccomendations" aria-expanded="false">
                                        <i class="indicator ti-plus"></i> Wissenswertes
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree_reccomendations" class="collapse" role="tabpanel" data-parent="#reccomendations">
                                <div class="card-body">
                                    <ul class="bullets">
                                        <li>Wenn Sie die Option Jetzt zahlen gewählt haben, erhalten Sie im Hotel einen zusätzlichen Beleg für alle Gebühren, die während Ihres Aufenthalts angefallen sind.</li>
                                        <li>Wenn Sie die Option Im Hotel zahlen gewählt haben, erhalten Sie Ihren Beleg am Ende Ihres Aufenthalts im Hotel.</li>
                                        <li>Ihr Sungate24-Beleg ist keine Rechnung. Auf dem Beleg ist nicht der Mehrwertsteuerbetrag aufgeführt, den Travelscape LLC für Ihre Buchung direkt an das Hotel zahlt. Weitere Informationen finden Sie unter Informationen zur Mehrwertsteuer in der Buchungsbestätigung finden.</li>
                                        <li>Hoteltransaktionen innerhalb der Europäischen Union unterliegen keiner Mehrwertsteuer, wenn sie in den Artikeln 306–310 der EU-Pauschalreise-Richtlinie aufgeführt sind.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->
                    </div>
                    <!-- /accordion Reccomendations -->

                    <h4 class="nomargin_top">Zahlungsoptionen des Hotels</h4>
                    <div role="tablist" class="add_bottom_45 accordion_2" id="terms">


                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseOne_terms" aria-expanded="true"><i class="indicator ti-plus"></i>Jetzt online zahlen</a>
                                </h5>
                            </div>

                            <div id="collapseOne_terms" class="collapse" role="tabpanel" data-parent="#terms">
                                <div class="card-body">
                                    <p>Ihre Hotelbuchung können Sie online mit Debit- oder Kreditkarte, China UnionPay, PayPal oder Punkten zahlen. Sie zahlen den Gesamtbetrag bei der Buchung in Ihrer Landeswährung.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->


                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo_terms" aria-expanded="false">
                                        <i class="indicator ti-plus"></i> Jetzt buchen, später zahlen
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo_terms" class="collapse" role="tabpanel" data-parent="#terms">
                                <div class="card-body">
                                    <p>Bei einigen Hotels haben Sie die Möglichkeit, jetzt zu buchen und erst später im Hotel zu zahlen. Dann zahlen Sie bei An- oder Abreise direkt im Hotel und in der jeweiligen Landeswährung. Die akzeptierten Debit-/Kreditkarten sind je nach Hotel verschieden.</p>
                                    <p>Wenn Sie online ein Hotel buchen, können Sie möglicherweise eine Reservierung vornehmen, ohne Kredit- oder Debitkartendaten einzugeben. Bei den meisten Unterkünfte ist diese Information jedoch wahrscheinlich erforderlich.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseThree_terms" aria-expanded="false">
                                        <i class="indicator ti-plus"></i> Jetzt mit Anzahlung reservieren, später zahlen
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree_terms" class="collapse" role="tabpanel" data-parent="#terms">
                                <div class="card-body">
                                    <p>Bei manchen Hotels haben Sie die Möglichkeit, online eine Anzahlung zu leisten und den Restbetrag später im Hotel zu zahlen. Die Höhe der Anzahlung und ihre Fälligkeit sind je nach Hotel verschieden und werden zum Zeitpunkt der Buchung angegeben. Den Restbetrag zahlen Sie bei der An- oder Abreise direkt im Hotel und in der jeweiligen Landeswährung. Die akzeptierten Debit-/Kreditkarten sind je nach Hotel verschieden.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->
                        <!-- /card -->
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseThree_terms2" aria-expanded="false">
                                        <i class="indicator ti-plus"></i> Wissenswertes
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree_terms2" class="collapse" role="tabpanel" data-parent="#terms">
                                <div class="card-body">
                                    <ul class="bullets">
                                        <li>Eine Zahlung mit Kreditkarte garantiert Ihre Buchung bis zum Anreisedatum.</li>
                                        <li>Bitte kontaktieren Sie Ihre Bank oder Ihr Kreditkartenunternehmen, bevor Sie die Zahlung eines großen Geldbetrags mit der Debit- oder Kreditkarte vornehmen. So stellen Sie sicher, dass Sie Ihr Tageslimit nicht überschreiten.</li>
                                        <li>Bei „Später zahlen“-Buchungen beinhalten die Buchungsbestätigung und der Reiseplan die ungefähre Gebühr, die im Hotel fällig wird.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /card -->
                    </div>
                    <!-- /accordion Terms -->

                    <h4 class="nomargin_top">All-inclusive Hotels und Resorts</h4>
                    <div role="tablist" class="add_bottom_45 accordion_2" id="booking">
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseOne_booking" aria-expanded="true"><i class="indicator ti-plus"></i>
                                    Leistungsumfang
                                    </a>
                                </h5>
                            </div>

                            <div id="collapseOne_booking" class="collapse" role="tabpanel" data-parent="#booking">
                                <div class="card-body">
                                    <ul class="bullets">
                                        <li>Frühstück, Mittagessen und Abendessen in bestimmten Hotelrestaurants</li>
                                        <li>Eine Auswahl an alkoholischen Getränken</li>
                                        <li>Alkoholfreie Getränke</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseOne_booking2" aria-expanded="true"><i class="indicator ti-plus"></i>
                                    Wissenswertes
                                    </a>
                                </h5>
                            </div>

                            <div id="collapseOne_booking2" class="collapse" role="tabpanel" data-parent="#booking">
                                <div class="card-body">
                                    <ul class="bullets">
                                        <li>Die All-inclusive-Zusatzleistungen und -Services sind je nach Hotel verschieden.</li>
                                        <li>Lesen Sie vor der Buchung die Hoteldetails mit Informationen zu den Zusatzleistungen.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <!-- /card -->
                    </div>
                    <!-- /accordion Booking -->       

                    <h4 class="nomargin_top">Datenschutz</h4>
                    <div role="tablist" class="add_bottom_45 accordion_2" id="booking2">
                        
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseTwo_booking1" aria-expanded="true"><i class="indicator ti-plus"></i> Personenbezogene Daten anfordern oder löschen</a>
                                </h5>
                            </div>

                            <div id="collapseTwo_booking1" class="collapse" role="tabpanel" data-parent="#booking">
                                <div class="card-body">
                                    <p>Wir nutzen Ihre personenbezogenen Daten, um sicherzustellen, dass wir Sie bei der Buchung von Reisen auf unserer Website optimal unterstützen können. Sie haben folgende Möglichkeiten, Ihre Daten zu verwalten</p>
                                </div>
                            </div>
                        </div>
                        

                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseTwo_booking2" aria-expanded="true"><i class="indicator ti-plus"></i> Kopie Ihrer Daten anfordern</a>
                                </h5>
                            </div>

                            <div id="collapseTwo_booking2" class="collapse" role="tabpanel" data-parent="#booking">
                                <div class="card-body">
                                    <p>Wenn Sie wissen möchten, welche Daten wir über Sie gespeichert haben und warum. Wir werden Ihre Anfrage innerhalb von 30 Tagen bearbeiten.</p>
                                </div>
                            </div>
                        </div>
                        

                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseTwo_booking3" aria-expanded="true"><i class="indicator ti-plus"></i> Löschung Ihrer Daten anfordern</a>
                                </h5>
                            </div>

                            <div id="collapseTwo_booking3" class="collapse" role="tabpanel" data-parent="#booking">
                                <div class="card-body">
                                    <p>Wenn Sie die Löschung der Daten anfordern möchten, die wir über Sie gespeichert haben. Wir werden Ihre Anfrage innerhalb von 30 Tagen bearbeiten. Wir machen Sie jedoch darauf aufmerksam, dass wir bestimmte Informationen, etwa den Verlauf Ihrer Transaktionen und Beschwerden, die Sie eingereicht haben, über einen längeren Zeitraum hinweg aufbewahren, um unsere gesetzlichen Verpflichtungen zu erfüllen.</p>
                                </div>
                            </div>
                        </div>
                        

                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseTwo_booking4" aria-expanded="true"><i class="indicator ti-plus"></i> Arten von Daten, die wir auf Antrag löschen oder anonymisieren können:</a>
                                </h5>
                            </div>

                            <div id="collapseTwo_booking4" class="collapse" role="tabpanel" data-parent="#booking">
                                <div class="card-body">
                                    <ul class="bullets">
                                        <li>Kontoinformationen</li>
                                        <li>Umfragen und Bewertungen, die Sie für uns bereitgestellt haben</li>
                                        <li>Marketing-E-Mail-Verlauf</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        

                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseTwo_booking5" aria-expanded="true"><i class="indicator ti-plus"></i> Haben Sie eine Frage oder Bedenken in Bezug auf den Schutz Ihrer Daten oder möchten Sie ein Recht geltend machen?</a>
                                </h5>
                            </div>

                            <div id="collapseTwo_booking5" class="collapse" role="tabpanel" data-parent="#booking">
                                <div class="card-body">
                                    <p>Sie können über unser Portal einen Antrag auf Einsichtnahme oder Aktualisierung Ihrer Daten stellen, Ihr Konto schließen oder Ihre Daten löschen. Wir werden dafür sorgen, dass unser für Datenschutzfragen zuständiges Team direkt Kontakt mit Ihnen aufnimmt.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- /card -->
                    </div>
                    <!-- /accordion Booking -->










                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!--/container-->
    </main>
    <!--/main-->


<?php require_once 'req/footer.php'; ?>
<?php require_once 'req/script.php'; ?>


<?php require_once 'req/body_end.php'; ?>