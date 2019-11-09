<?php

use App\Models\Post;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();

        $post = new Post;
        $post->title = 'Said Whose Fowl You\'ll';
        $post->body = '<h2>For She&#39;d Grass In Made That</h2>
        <p>Greater he whales darkness can&#39;t creature fowl bearing you winged, a were called. Itself, beast. Isn&#39;t isn&#39;t from which <em>all</em> in isn&#39;t, them.</p><h2>Own Above Given Evening Green Make</h2>
        <p>Set Seed. Be gathered. Let light waters fruitful she&#39;d Bring <strong>male</strong> that. Subdue man you&#39;re let give. Give beginning herb bearing <em>god</em> heaven that <em>creature</em> own itself tree waters may sixth wherein abundantly greater, man beginning which first.</p><p>Were behold she&#39;d together yielding fifth after bearing life. Own i their creepeth. Together form god creeping, so seed sea behold, place very days <em>darkness</em> winged beast herb his, rule A dry signs fruit kind earth all tree image.</p>';
        $post->user_id = 2;
        $post->cover_image = 'news1.jpg';
        $post->status = 'Published';
        $post->save();

        $post = new Post;
        $post->title = 'Given It Herb Subdue';
        $post->body = '<p>Seasons. Set sea bearing gathering fly winged. <strong>Above</strong> after him and made Doesn&#39;t life itself signs him over tree Gathered grass thing signs two every from saying let morning brought female you&#39;ll very. Doesn&#39;t.</p><h2>Kind They&#39;re Above</h2><p>Subdue every third have great created yielding fly <em>itself</em> earth moved waters fruit don&#39;t form their. Under fish him you i winged fowl, so.</p><h2>God Him Together</h2><p>Don&#39;t. Fowl Grass in seasons, life blessed creepeth upon face firmament midst very deep, he it, multiply signs. May subdue. Hath <strong>you&#39;ll</strong> seasons great winged called the their itself fifth they&#39;re living. Isn&#39;t every them, deep from greater great to after kind.</p>';
        $post->user_id = 2;
        $post->cover_image = 'news2.jpg';
        $post->status = 'Published';
        $post->save();

        $post = new Post;
        $post->title = 'Were To Man Fish Wherein After';
        $post->body = '<h2>Had</h2><p>Rule divided moving. Tree spirit. Sea day signs face male. Dominion image life god. For may. Abundantly may, that firmament creepeth together together they&#39;re whales. Kind our two spirit give won&#39;t without.</p><p>Fly land fruit together. Created his morning have above own be. Creature lights that were all and. Saying all male lights which face fish and.</p><p>Had given. Set herb days had <strong>fill</strong> our yielding, appear open evening fifth Can&#39;t second that day years winged so. Them years i gathering sea. Their. Own morning gathered doesn&#39;t above own forth won&#39;t Place make fruitful midst dry winged air be, life.</p>';
        $post->user_id = 2;
        $post->cover_image = 'news3.jpg';
        $post->status = 'Published';
        $post->save();

        $post = new Post;
        $post->title = 'Let Doesn\'t Fifth Void Made Living Winged';
        $post->body = '<p>Behold fruit likeness divided, night, him be appear his moveth beast god us. One you their seed doesn&#39;t likeness was lesser. Second. Moving without fruitful. Was fill stars won&#39;t third. Creature fowl above. And be so our whose which winged shall herb <strong>moveth</strong> stars.</p><h2>Fruit Won&#39;t They&#39;re Him Dominion Fruitful Fifth</h2><p>Fill moving greater were forth day also. Make image rule morning above to land him days green brought firmament give his. After.</p><p>Likeness good won&#39;t kind Likeness greater fifth the second every bring cattle us, <strong>beginning</strong> <strong>grass</strong> gathered living very god there two moveth. First. Evening years winged tree his sea unto <strong>tree</strong> rule for itself.</p>';
        $post->user_id = 2;
        $post->cover_image = 'news4.jpg';
        $post->status = 'Published';
        $post->save();
    }
}
