<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Affiche le liste de toutes les compétences (Skills)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::all();
        return view('skills.index', ['skills' => $skills]);
    }

    /**
     * Affiche le formulaire de création d'une compétence
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('skills.create');
    }

    /**
     * "Stocke"/insère en base de données une nouvelle compétence (renseignées depuis le formaulaire renvoyé par create)
     *
     * @param  \Illuminate\Http\Request  $request contient les données du formulaire pour la création de la compétence
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // On va traiter les champs de formulaire, il faut les valider, en définissant nos règles de validation
        $validatedData = $request->validate([
            'label' => 'required'//'required|unique:skills,label',
        ]);

        $skill = new Skill(); 
        $skill->label = $validatedData['label'];
        $skill->save();
        return 'On a essayé de créer une compétence';
    }

    /**
     * Affiche la compétence passée en paramètre
     *
     * @param  \App\Models\Skill  $skill : la compétence à afficher 
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Affiche le formulaire permettant de mettre à jour la compétence donnée en paramètre
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        //
    }

    /**
     * Mets à jour la compétence donnée en paramètre en fonction des données du formulaire (contenues dans $request)
     *
     * @param  \Illuminate\Http\Request  $request contient les données du formulaire pour la mise à jour de la compétence
     * @param  \App\Models\Skill  $skill la compétence à mettre à jour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        //
    }

    /**
     * Supprime de la base de donnée la compétence passée en paramètre. 
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        //
    }
}
