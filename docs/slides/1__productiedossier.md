<section data-markdown>
    <textarea data-template>
        # PRODUCTIEDOSSIER
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        ## I. DISCOVER
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        ### Briefing

        Een thematisch veilingsplatform om kopers en verkopers in contact te brengen. 
        
        - Frontoffice -> Eindgebruiker

        - Backoffice -> Beheerder

        - API -> Communiticate

    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        ## II. DEFINE
    </textarea>
</section>


<section data-markdown>
    <textarea data-template>
        ### Concept - AquaLobby

        ---

        Een veiling platform creëren voor:

        - Kwekers

        - Hobbyisten

        - Bedrijven

        - Gewone mensen

        Waarbij verschillende soorten van koi vissen geveild kunnen worden.
    </textarea>
</section>


<section data-markdown>
    <textarea data-template>
        ### Planning

        ---

        Gantt Chart Data

        ![GANTT Chart Data]({{ "/assets/images/define/gantt-chart-data.png" | absolute_url }})    
    </textarea>    
</section>

<section data-markdown>
    <textarea data-template>
        ### Planning

        ---

        Gantt Chart Graph
   
        ![GANTT Chart Data]({{ "/assets/images/define/gantt-chart-graph.png" | absolute_url }})
    </textarea>    
</section>

<section data-markdown>
    <textarea data-template>
        ### Planning

        ---

        Work Breakdown Structure

        ![GANTT Chart Data]({{ "/assets/images/define/wbs.png" | absolute_url }})
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        ### Concurrenten Analyse

        ---

        Concurrenten Analyse in tabel
        
        ![Concurrenten Analyse in tabel]({{ "/assets/images/define/analyse_table.png" | absolute_url }})

    </textarea>
</section>

<section data-markdown>
    <textarea data-template style="font-size:12px">
        ### Afgewerkte Requirements Backoffice
        - Verschillende rollen (Admin, Moderator & Customer),
        - Authenticatie van beheerders (Customer of Guest niet toegelaten),
        - Beheer van beheerders (Admin mag alles, Mod niet),
        - Beheer van customers & vissen (CRUD),
        - Beheer van categorieën & subcategoriën (Moderator mag alleen Subcategorieën),
        - ...
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        ### Afgewerkt Requirements Frontoffice
        - Verschillende rollen (Bezoeker, Gebruiker),
        - Registratie (Customer of Guest),
        - Authenticatie van klanten (JWT, password reset),
        - Beheer van vissen & bids (create, publish, unpublish)
        - Lijst/detail van bid, plaatsen, filteren, ...,
        - ...

    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        ## III. DESIGN
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        ### Data Model
    </textarea>
</section>

<section data-markdown>
    <textarea data-template class="bigImage">
    <img alt="data model" src="./../assets/images/design/eer.png" width="auto" height="600px" />
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        ### Sitemap

        ---
         <img alt="sitemap backoffice" src="./../assets/images/design/sitemap-backoffice.png" width="1800" height="390px" />
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        Wireframes - Backoffice - 0.0.0 Login

        <img alt="sitemap backoffice" src="./../assets/images/design/wireframes/0.0.0 login.png" width="1800" height="470px"/>
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
         Wireframes - Backoffice - 1.0.0 Dashboard
        <img alt="sitemap backoffice" src="./../assets/images/design/wireframes/1.0.0 dashboard.png" width="1800" height="510px"/>
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        Wireframes - Backoffice - 1.3.0 Fishes
        <img alt="sitemap backoffice" src="./../assets/images/design/wireframes/1.3.0 fishes.png" width="1800" height="510px"/>
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        Wireframes - Backoffice - 1.X.1 Add XXXX
        <img alt="sitemap backoffice" src="./../assets/images/design/wireframes/1.X.1 add XXXX.png" width="1800" height="510px"/>
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        Style Tile
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
         <img alt="style tile" src="./../assets/images/design/style_tile.png" width="auto" height="640px" />
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        Screen Designs Backoffice - 0.0.0 login

           <img alt="sitemap backoffice" src="./../assets/images/design/screen designs backoffice/0.0.0 login.png" width="1800" height="510px"/>
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
         Screen Designs - Backoffice - 1.0.0 Dashboard
        <img alt="sitemap backoffice" src="./../assets/images/design/screen designs backoffice/1.0.0 dashboard.png" width="1800" height="510px"/>
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        Screen Designs - Backoffice - 1.3.0 Fishes
        <img alt="sitemap backoffice" src="./../assets/images/design/screen designs backoffice/1.3.0 fishes.png" width="1800" height="510px"/>
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        Screen Designs - Backoffice - 1.X.1 Add XXXX
        <img alt="sitemap backoffice" src="./../assets/images/design/screen designs backoffice/1.X.1 add XXXX.png" width="1800" height="510px"/>
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        Screen Designs - Frontoffice - Login

 <img alt="sitemap backoffice" src="./../assets/images/design/screen designs front/login.png" width="auto" height="555px"/>
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        Screen Designs - Frontoffice - Auctions
        <img alt="sitemap backoffice" src="./../assets/images/design/screen designs front/auctions.png" width="auto" height="585px"/>
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
         Screen Designs - Frontoffice - Fishdetail
        <img alt="sitemap backoffice" src="./../assets/images/design/screen designs front/fishdetail.png" width="auto" height="585px"/>
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        Screen Designs - Frontoffice - Add Form
        <img alt="sitemap backoffice" src="./../assets/images/design/screen designs front/add-form.png" width="auto" height="585px"/>
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        Screen Designs - Frontoffice - FAQ
        <img alt="sitemap backoffice" src="./../assets/images/design/screen designs front/faq.png" width="auto" height="585px"/>
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        ### 6. Style Guide
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
         <img alt="Style guide" src="./../assets/images/design/ui_style_guide.png" width="auto" height="640px" />
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        ## IV. DEVELOP
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        ## V. DELIVER
    </textarea>
</section>

<section data-markdown>
    <textarea data-template>
        ## VI. DEPLOY
    </textarea>
</section>
